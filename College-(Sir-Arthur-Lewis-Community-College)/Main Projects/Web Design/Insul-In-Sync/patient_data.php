<?php
require_once 'includes/config.php';
require_once 'includes/encryption.php';
require_once 'includes/encryption_config.php';

// Check if caregiver is logged in
if (!isset($_SESSION['caregiver_id'])) {
    header("Location: care_giver_access.php");
    exit();
}

// Check if patient ID is provided
if (!isset($_GET['patient_id'])) {
    header("Location: care_giver_access.php?step=2");
    exit();
}

$patient_id = $_GET['patient_id'];

// Verify caregiver has access to this patient
$check_sql = "SELECT * FROM grant_access WHERE caregiver_id = ? AND patient_id = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("ii", $_SESSION['caregiver_id'], $patient_id);
$check_stmt->execute();
$access = $check_stmt->get_result()->fetch_assoc();

if (!$access) {
    header("Location: care_giver_access.php?step=2");
    exit();
}

// Check if caregiver has any data access
$has_data_access = $access['access_glucose'] || $access['access_pressure'] || $access['access_cholesterol'];

// Only get patient info if they have data access
if ($has_data_access) {
    // Get patient info
    $patient_sql = "SELECT * FROM patients WHERE id = ?";
    $patient_stmt = $conn->prepare($patient_sql);
    $patient_stmt->bind_param("i", $patient_id);
    $patient_stmt->execute();
    $patient_data = $patient_stmt->get_result()->fetch_assoc();

    // Decrypt patient personal data
    $patient_data['dob'] = decryptData($patient_data['dob']);
    $patient_data['insulin'] = decryptData($patient_data['insulin']);
    $patient_data['type'] = decryptData($patient_data['type']);
    $patient_data['height'] = decryptData($patient_data['height']);
    $patient_data['weight'] = decryptData($patient_data['weight']);
    $patient_data['conditions'] = decryptData($patient_data['conditions']);
    $patient_data['address'] = decryptData($patient_data['address']);
    $patient_data['email'] = decryptData($patient_data['email']);
    $patient_data['phone'] = decryptData($patient_data['phone']);
    $patient_data['em_name'] = decryptData($patient_data['em_name']);
    $patient_data['em_address'] = decryptData($patient_data['em_address']);
    $patient_data['em_phone'] = decryptData($patient_data['em_phone']);

    // Get glucose data if access granted
    if ($access['access_glucose']) {
        $glucose_sql = "SELECT * FROM patient_glucose WHERE patient_id = ? ORDER BY time DESC LIMIT 10";
        $glucose_stmt = $conn->prepare($glucose_sql);
        $glucose_stmt->bind_param("i", $patient_id);
        $glucose_stmt->execute();
        $glucose_data = $glucose_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        
        // Decrypt glucose data
        foreach ($glucose_data as &$reading) {
            $reading['glucose'] = decryptData($reading['glucose']);
        }
    }

    // Get pressure data if access granted
    if ($access['access_pressure']) {
        $pressure_sql = "SELECT * FROM patient_pressure WHERE patient_id = ? ORDER BY time DESC LIMIT 10";
        $pressure_stmt = $conn->prepare($pressure_sql);
        $pressure_stmt->bind_param("i", $patient_id);
        $pressure_stmt->execute();
        $pressure_data = $pressure_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        
        // Decrypt pressure data
        foreach ($pressure_data as &$reading) {
            $reading['systolic'] = decryptData($reading['systolic']);
            $reading['diastolic'] = decryptData($reading['diastolic']);
            $reading['heart_rate'] = decryptData($reading['heart_rate']);
        }
    }

    // Get cholesterol data if access granted
    if ($access['access_cholesterol']) {
        $cholesterol_sql = "SELECT * FROM patient_cholesterol WHERE patient_id = ? ORDER BY time DESC LIMIT 10";
        $cholesterol_stmt = $conn->prepare($cholesterol_sql);
        $cholesterol_stmt->bind_param("i", $patient_id);
        $cholesterol_stmt->execute();
        $cholesterol_data = $cholesterol_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        
        // Decrypt cholesterol data
        foreach ($cholesterol_data as &$reading) {
            $reading['hdl'] = decryptData($reading['hdl']);
            $reading['ldl'] = decryptData($reading['ldl']);
            $reading['triglycerides'] = decryptData($reading['triglycerides']);
            $reading['total_cholesterol'] = decryptData($reading['total_cholesterol']);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2, h3 {
            color: #333;
            margin-bottom: 20px;
        }
        .patient-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-section h3 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .info-item strong {
            color: #2c3e50;
            display: inline-block;
            width: 150px;
        }
        .data-section {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f8f9fa;
        }
        .back-btn {
            background: #6c757d;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }
        .back-btn:hover {
            background: #5a6268;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #666;
            font-style: italic;
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
        .no-access-message {
            text-align: center;
            padding: 20px;
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            border-radius: 4px;
            color: #856404;
            margin: 20px 0;
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
        <a href="care_giver_access.php?step=2" class="back-btn">← Back to Patient List</a>
        
        <?php if (!$has_data_access): ?>
            <div class="no-access-message">
                <h3>Access Denied</h3>
                <p>You don't have permission to view this patient's information.</p>
            </div>
        <?php else: ?>
            <div class="patient-info">
                <h2>Patient Information</h2>
                <div class="info-grid">
                    <div class="info-section">
                        <h3>Personal Information</h3>
                        <div class="info-item">
                            <strong>Name:</strong> <?php echo htmlspecialchars($patient_data['firstname'] . ' ' . $patient_data['lastname']); ?>
                        </div>
                        <div class="info-item">
                            <strong>Gender:</strong> <?php echo htmlspecialchars($patient_data['gender']); ?>
                        </div>
                        <div class="info-item">
                            <strong>Date of Birth:</strong> <?php echo htmlspecialchars($patient_data['dob']); ?>
                        </div>
                        <div class="info-item">
                            <strong>Email:</strong> <?php echo htmlspecialchars($patient_data['email']); ?>
                        </div>
                        <div class="info-item">
                            <strong>Phone:</strong> <?php echo htmlspecialchars($patient_data['phone']); ?>
                        </div>
                        <div class="info-item">
                            <strong>Address:</strong> <?php echo htmlspecialchars($patient_data['address']); ?>
                        </div>
                    </div>

                    <div class="info-section">
                        <h3>Medical Information</h3>
                        <div class="info-item">
                            <strong>Diabetes Type:</strong> <?php echo htmlspecialchars($patient_data['type']); ?>
                        </div>
                        <div class="info-item">
                            <strong>Insulin User:</strong> <?php echo htmlspecialchars($patient_data['insulin']); ?>
                        </div>
                        <div class="info-item">
                            <strong>Height:</strong> <?php echo htmlspecialchars($patient_data['height']); ?> cm
                        </div>
                        <div class="info-item">
                            <strong>Weight:</strong> <?php echo htmlspecialchars($patient_data['weight']); ?> kg
                        </div>
                        <div class="info-item">
                            <strong>Conditions:</strong> <?php echo htmlspecialchars($patient_data['conditions']); ?>
                        </div>
                    </div>

                    <div class="info-section">
                        <h3>Emergency Contact</h3>
                        <div class="info-item">
                            <strong>Name:</strong> <?php echo htmlspecialchars($patient_data['em_name']); ?>
                        </div>
                        <div class="info-item">
                            <strong>Phone:</strong> <?php echo htmlspecialchars($patient_data['em_phone']); ?>
                        </div>
                        <div class="info-item">
                            <strong>Address:</strong> <?php echo htmlspecialchars($patient_data['em_address']); ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($access['access_glucose']): ?>
                <div class="data-section">
                    <h3>Glucose Readings</h3>
                    <?php if (isset($glucose_data) && !empty($glucose_data)): ?>
                        <table>
                            <tr>
                                <th>Time</th>
                                <th>Glucose Level (mg/dL)</th>
                            </tr>
                            <?php foreach ($glucose_data as $reading): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($reading['time']); ?></td>
                                    <td><?php echo htmlspecialchars($reading['glucose']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <p class="no-data">No glucose readings available</p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($access['access_pressure']): ?>
                <div class="data-section">
                    <h3>Blood Pressure Readings</h3>
                    <?php if (isset($pressure_data) && !empty($pressure_data)): ?>
                        <table>
                            <tr>
                                <th>Time</th>
                                <th>Systolic (mmHg)</th>
                                <th>Diastolic (mmHg)</th>
                                <th>Heart Rate (bpm)</th>
                            </tr>
                            <?php foreach ($pressure_data as $reading): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($reading['time']); ?></td>
                                    <td><?php echo htmlspecialchars($reading['systolic']); ?></td>
                                    <td><?php echo htmlspecialchars($reading['diastolic']); ?></td>
                                    <td><?php echo htmlspecialchars($reading['heart_rate']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <p class="no-data">No blood pressure readings available</p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($access['access_cholesterol']): ?>
                <div class="data-section">
                    <h3>Cholesterol Readings</h3>
                    <?php if (isset($cholesterol_data) && !empty($cholesterol_data)): ?>
                        <table>
                            <tr>
                                <th>Time</th>
                                <th>HDL (mg/dL)</th>
                                <th>LDL (mg/dL)</th>
                                <th>Triglycerides (mg/dL)</th>
                                <th>Total (mg/dL)</th>
                            </tr>
                            <?php foreach ($cholesterol_data as $reading): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($reading['time']); ?></td>
                                    <td><?php echo htmlspecialchars($reading['hdl']); ?></td>
                                    <td><?php echo htmlspecialchars($reading['ldl']); ?></td>
                                    <td><?php echo htmlspecialchars($reading['triglycerides']); ?></td>
                                    <td><?php echo htmlspecialchars($reading['total_cholesterol']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <p class="no-data">No cholesterol readings available</p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html> 