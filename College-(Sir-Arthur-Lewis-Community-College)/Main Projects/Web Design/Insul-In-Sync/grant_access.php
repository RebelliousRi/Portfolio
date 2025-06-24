<?php
require_once 'includes/config.php';

// Get current step from URL parameter
$current_step = isset($_GET['step']) ? (int)$_GET['step'] : 1;
$progress_width = ($current_step / 3) * 100;

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['patient_login'])) {
        // Step 1: Patient Login
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        
        // First get the user's hashed password
        $sql = "SELECT id, username, pwd FROM patients WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $patient = $result->fetch_assoc();
            // Verify the password
            if (password_verify($pwd, $patient['pwd'])) {
                $_SESSION['patient_id'] = $patient['id'];
                $_SESSION['patient_username'] = $patient['username'];
                header("Location: grant_access.php?step=2");
                exit();
            } else {
                $error = "Invalid password";
            }
        } else {
            $error = "Username not found";
        }
    } elseif (isset($_POST['select_caregiver'])) {
        // Step 2: Select Caregiver
        $username = trim($_POST['caregiver_username']);
        $firstname = trim($_POST['caregiver_firstname']);
        $lastname = trim($_POST['caregiver_lastname']);

        // Validate input
        if (empty($username) || empty($firstname) || empty($lastname)) {
            $error = "All caregiver fields are required";
        } else {
            // Check if caregiver exists
            $stmt = $conn->prepare("SELECT id FROM care_givers WHERE username = ? AND firstname = ? AND lastname = ?");
            if (!$stmt) {
                $error = "Database error: " . $conn->error;
            } else {
                $stmt->bind_param("sss", $username, $firstname, $lastname);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $_SESSION['caregiver_id'] = $row['id'];
                    $_SESSION['caregiver_name'] = $firstname . ' ' . $lastname;
                    header("Location: grant_access.php?step=3");
                    exit();
                } else {
                    $error = "Caregiver not found. Please check the details and try again.";
                }
                $stmt->close();
            }
        }
    } elseif (isset($_POST['setup_access'])) {
        // Step 3: Setup Access Permissions
        if (!isset($_SESSION['patient_id']) || !isset($_SESSION['caregiver_id'])) {
            $error = "Session data missing. Please start over.";
        } else {
            $patient_id = $_SESSION['patient_id'];
            $caregiver_id = $_SESSION['caregiver_id'];
            $access_glucose = isset($_POST['access_glucose']) ? 1 : 0;
            $access_pressure = isset($_POST['access_pressure']) ? 1 : 0;
            $access_cholesterol = isset($_POST['access_cholesterol']) ? 1 : 0;
            
            // Check if access already exists
            $check_sql = "SELECT * FROM grant_access WHERE caregiver_id = ? AND patient_id = ?";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->bind_param("ii", $caregiver_id, $patient_id);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();
            
            if ($check_result->num_rows > 0) {
                $error = "Access already granted for this caregiver";
            } else {
                $sql = "INSERT INTO grant_access (caregiver_id, patient_id, access_glucose, access_pressure, access_cholesterol) 
                        VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iiiii", $caregiver_id, $patient_id, $access_glucose, $access_pressure, $access_cholesterol);
                
                if ($stmt->execute()) {
                    $_SESSION['success'] = "Access granted successfully";
                    header("Location: data_access.php");
                    exit();
                } else {
                    $error = "Error granting access: " . $conn->error;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grant Caregiver Access</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h3 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
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
        .checkbox-group {
            margin: 10px 0;
        }
        .checkbox-group label {
            display: inline;
            margin-left: 5px;
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
        <h3>Grant Access to Caregiver</h3>
        <div class="progress">
            <div class="progress-bar" style="--progress-width: <?php echo $progress_width; ?>%"></div>
        </div>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if ($current_step === 1): ?>
            <!-- Step 1: Patient Login -->
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" id="pwd" name="pwd" required>
                </div>
                <button type="submit" name="patient_login">Login</button>
            </form>

        <?php elseif ($current_step === 2): ?>
            <!-- Step 2: Select Caregiver -->
            <form method="POST" action="">
                <div class="form-group">
                    <label for="caregiver_username">Caregiver Username</label>
                    <input type="text" id="caregiver_username" name="caregiver_username" required>
                </div>
                <div class="form-group">
                    <label for="caregiver_firstname">Caregiver First Name</label>
                    <input type="text" id="caregiver_firstname" name="caregiver_firstname" required>
                </div>
                <div class="form-group">
                    <label for="caregiver_lastname">Caregiver Last Name</label>
                    <input type="text" id="caregiver_lastname" name="caregiver_lastname" required>
                </div>
                <button type="submit" name="select_caregiver">Next</button>
            </form>

        <?php elseif ($current_step === 3): ?>
            <!-- Step 3: Setup Access Permissions -->
            <form method="POST" action="">
                <div class="form-group">
                    <label>Select Access Permissions</label>
                    <div class="checkbox-group">
                        <input type="checkbox" name="access_glucose" id="access_glucose">
                        <label for="access_glucose">Glucose Access</label>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" name="access_pressure" id="access_pressure">
                        <label for="access_pressure">Pressure Access</label>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" name="access_cholesterol" id="access_cholesterol">
                        <label for="access_cholesterol">Cholesterol Access</label>
                    </div>
                </div>
                <button type="submit" name="setup_access">Grant Access</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>