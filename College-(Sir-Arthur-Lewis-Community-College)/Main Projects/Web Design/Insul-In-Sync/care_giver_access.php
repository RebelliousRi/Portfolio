<?php
require_once 'includes/config.php';
require_once 'includes/encryption.php';
require_once 'includes/encryption_config.php';

// Get current step from URL parameter
$current_step = isset($_GET['step']) ? (int)$_GET['step'] : 1;
$progress_width = ($current_step / 2) * 100;

// Handle caregiver login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['caregiver_login'])) {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    
    // First get the caregiver's hashed password
    $sql = "SELECT id, username, pwd, firstname, lastname FROM care_givers WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $caregiver = $result->fetch_assoc();
        // Verify the password
        if (password_verify($pwd, $caregiver['pwd'])) {
            $_SESSION['caregiver_id'] = $caregiver['id'];
            $_SESSION['caregiver_name'] = $caregiver['firstname'] . ' ' . $caregiver['lastname'];
            header("Location: care_giver_access.php?step=2");
            exit();
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "Username not found";
    }
}

// Check if caregiver is logged in
if (!isset($_SESSION['caregiver_id']) || !isset($_SESSION['caregiver_name'])) {
    // If not logged in and trying to access step 2, redirect to login
    if ($current_step === 2) {
        header("Location: care_giver_access.php?step=1");
        exit();
    }
}

// Get patient data if caregiver is logged in
$patients = [];
if (isset($_SESSION['caregiver_id'])) {
    // Modified query to only get patients where caregiver has at least one type of access
    $sql = "SELECT p.*, ga.access_glucose, ga.access_pressure, ga.access_cholesterol 
            FROM patients p 
            JOIN grant_access ga ON p.id = ga.patient_id 
            WHERE ga.caregiver_id = ? 
            AND (ga.access_glucose = 1 OR ga.access_pressure = 1 OR ga.access_cholesterol = 1)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['caregiver_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        // Decrypt patient name
        $row['firstname'] = decryptData($row['firstname']);
        $row['lastname'] = decryptData($row['lastname']);
        $patients[] = $row;
    }
}

// Get specific patient data if requested
$patient_data = null;
if (isset($_GET['patient_id']) && isset($_SESSION['caregiver_id'])) {
    $patient_id = $_GET['patient_id'];
    
    // Verify caregiver has access to this patient
    $check_sql = "SELECT * FROM grant_access WHERE caregiver_id = ? AND patient_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ii", $_SESSION['caregiver_id'], $patient_id);
    $check_stmt->execute();
    $access = $check_stmt->get_result()->fetch_assoc();
    
    if ($access) {
        // Get patient info
        $patient_sql = "SELECT * FROM patients WHERE id = ?";
        $patient_stmt = $conn->prepare($patient_sql);
        $patient_stmt->bind_param("i", $patient_id);
        $patient_stmt->execute();
        $patient_data = $patient_stmt->get_result()->fetch_assoc();
        
        // Get glucose data if access granted
        if ($access['access_glucose']) {
            $glucose_sql = "SELECT * FROM patient_glucose WHERE patient_id = ? ORDER BY time DESC LIMIT 10";
            $glucose_stmt = $conn->prepare($glucose_sql);
            $glucose_stmt->bind_param("i", $patient_id);
            $glucose_stmt->execute();
            $glucose_data = $glucose_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }
        
        // Get pressure data if access granted
        if ($access['access_pressure']) {
            $pressure_sql = "SELECT * FROM patient_pressure WHERE patient_id = ? ORDER BY time DESC LIMIT 10";
            $pressure_stmt = $conn->prepare($pressure_sql);
            $pressure_stmt->bind_param("i", $patient_id);
            $pressure_stmt->execute();
            $pressure_data = $pressure_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }
        
        // Get cholesterol data if access granted
        if ($access['access_cholesterol']) {
            $cholesterol_sql = "SELECT * FROM patient_cholesterol WHERE patient_id = ? ORDER BY time DESC LIMIT 10";
            $cholesterol_stmt = $conn->prepare($cholesterol_sql);
            $cholesterol_stmt->bind_param("i", $patient_id);
            $cholesterol_stmt->execute();
            $cholesterol_data = $cholesterol_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caregiver Access Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2, h3 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .progress {
            height: 20px;
            background: #f0f0f0;
            border-radius: 10px;
            margin: 20px 0;
        }
        .progress-bar {
            height: 100%;
            background: #4CAF50;
            border-radius: 10px;
            width: var(--progress-width);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background: #45a049;
        }
        .error {
            color: #f44336;
            background: #ffebee;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .patient-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .patient-card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 4px;
            background: white;
            transition: transform 0.2s;
        }
        .patient-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .access-badge {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 0.9em;
            margin-left: 5px;
        }
        .access-yes {
            background-color: #4CAF50;
            color: white;
        }
        .access-no {
            background-color: #f44336;
            color: white;
        }
        .logout-btn {
            background: #f44336;
            margin-top: 20px;
        }
        .logout-btn:hover {
            background: #d32f2f;
        }
        .no-patients {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 4px;
            color: #666;
        }
    </style>
</head>
<body>

<nav id="navbar">
  <div class="logo">
    <a href="index1.php"><img src="logo.png"></a>
    <a href="index1.php">Insul-In-Sync</a>
  </div>
  <ul>
        <li><a href="about.php">About Us</a></li>
    <li><a href="education.php">Education</a></li>
    <li><a href="contact.php">Contact Medical Services</a></li>

    <?php
if (isset($_SESSION['username'])) {
    echo <<<HTML
    <li class="dropdown">
        <a href="#">Tools</a>
        <div class="dropdown-content">
            <a href="pressure.php">Blood Pressure Log</a>
            <a href="glucose.php">Blood Glucose Log</a>
            <a href="cholesterol.php">Blood Cholesterol Log</a>
            <a href="schedule.php">Schedule</a>
        </div>
    </li> 

    <li class="dropdown">
        <a href="#">Account</a>
        <div class="dropdown-content">
HTML;
        
        if ($_SESSION['acctype'] == 'patient') {
            echo ' <a href="data_access.php">Data Access</a>';
        }

        if ($_SESSION['acctype'] == 'care_giver') {
            echo '<a href="care_giver_access.php">Patient Data</a>';
        }

        echo <<<HTML
            <a href="includes/logout.php">Log Out</a>
        </div>
    </li>
    HTML;
}
?>

<?php
if (!isset($_SESSION['username'])) {
    echo <<<HTML
    <li><a href="login.php">Log In</a></li>
        <li><a href="signup.php">Sign Up</a></li>
    HTML;
}
?>

  </ul>
</nav>

<?php
if (isset($_SESSION['username'])) {
    echo "<h2>Welcome " . $_SESSION['username'] . "!</h2>";
} 
?>


    <div class="container">
    <h2>Caregiver Access Portal</h2>        
        <div class="progress">
            <div class="progress-bar" style="--progress-width: <?php echo $progress_width; ?>%"></div>
        </div>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if ($current_step === 1): ?>
            <!-- Step 1: Caregiver Login -->
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" id="pwd" name="pwd" required>
                </div>
                <button type="submit" name="caregiver_login">Login</button>
            </form>

        <?php elseif ($current_step === 2 && isset($_SESSION['caregiver_name'])): ?>
            <!-- Step 2: Patient List -->
            <h3>Welcome, <?php echo htmlspecialchars($_SESSION['caregiver_name']); ?></h3>
            
            <?php if (empty($patients)): ?>
                <div class="no-patients">
                    <h3>No Patients Available</h3>
                    <p>You don't have access to any patient data at this time.</p>
                </div>
            <?php else: ?>
                <div class="patient-list">
                    <?php foreach ($patients as $patient): ?>
                        <div class="patient-card">
                            <h3><?php echo htmlspecialchars($patient['firstname'] . ' ' . $patient['lastname']); ?></h3>
                            <p>Access to:</p>
                            <ul>
                                <?php if ($patient['access_glucose']): ?>
                                    <li>Glucose Readings</li>
                                <?php endif; ?>
                                <?php if ($patient['access_pressure']): ?>
                                    <li>Blood Pressure Readings</li>
                                <?php endif; ?>
                                <?php if ($patient['access_cholesterol']): ?>
                                    <li>Cholesterol Readings</li>
                                <?php endif; ?>
                            </ul>
                            <button onclick="window.location.href='patient_data.php?patient_id=<?php echo $patient['id']; ?>'">
                                View Patient Data
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
 
        <?php endif; ?>
    </div>
</body>
</html> 