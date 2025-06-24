<?php
include_once 'includes/config.php';

// Get current step from URL parameter or default to 3
$current_step = isset($_GET['step']) ? (int)$_GET['step'] : 3;

// Get existing access permissions
$existing_access = null;
if (isset($_SESSION['caregiver_id']) && isset($_SESSION['patient_id'])) {
    $check_sql = "SELECT access_glucose, access_pressure, access_cholesterol 
                  FROM grant_access 
                  WHERE caregiver_id = ? AND patient_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ii", $_SESSION['caregiver_id'], $_SESSION['patient_id']);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    if ($result->num_rows > 0) {
        $existing_access = $result->fetch_assoc();
    }
    $check_stmt->close();
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['step3'])) {
        // Validate required session variables
        if (!isset($_SESSION['patient_id']) || !isset($_SESSION['caregiver_id'])) {
            $error = "Session data is missing. Please start over.";
            header("Location: data_access.php");
            exit();
        } else {
            // Save access permissions
            $access_glucose = isset($_POST['access_glucose']) ? 1 : 0;
            $access_pressure = isset($_POST['access_pressure']) ? 1 : 0;
            $access_cholesterol = isset($_POST['access_cholesterol']) ? 1 : 0;
            
            // Update existing access
            $stmt = $conn->prepare("UPDATE grant_access SET access_glucose = ?, access_pressure = ?, access_cholesterol = ? WHERE caregiver_id = ? AND patient_id = ?");
            $stmt->bind_param("iiiii", $access_glucose, $access_pressure, $access_cholesterol, $_SESSION['caregiver_id'], $_SESSION['patient_id']);
            
            if ($stmt->execute()) {
                // Clear caregiver-related session variables after successful completion
                unset($_SESSION['caregiver_id']);
                unset($_SESSION['caregiver_name']);
                header("Location: edit_access.php?step=4");
                exit();
            } else {
                $error = "Error updating access permissions: " . $stmt->error;
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
    <title>Edit Access Permissions</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .wizard-step {
            display: none;
        }
        .wizard-step.active {
            display: block;
        }
        .error {
            color: red;
            margin-bottom: 10px;
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
        <h2>Edit Access Permissions</h2>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Step 3: Access Permissions -->
        <div class="wizard-step <?php echo $current_step == 3 ? 'active' : ''; ?>">
            <h3>Edit Access Permissions</h3>
            <p>Editing access for: <?php echo isset($_SESSION['caregiver_name']) ? $_SESSION['caregiver_name'] : 'Caregiver'; ?></p>
            <form method="POST" action="edit_access.php?step=3">
                <div>
                    <label>
                        <input type="checkbox" name="access_glucose" <?php echo ($existing_access && $existing_access['access_glucose']) ? 'checked' : ''; ?>>
                        Access to Glucose Readings
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="access_pressure" <?php echo ($existing_access && $existing_access['access_pressure']) ? 'checked' : ''; ?>>
                        Access to Blood Pressure Readings
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="access_cholesterol" <?php echo ($existing_access && $existing_access['access_cholesterol']) ? 'checked' : ''; ?>>
                        Access to Cholesterol Readings
                    </label>
                </div>
                <button type="submit" name="step3">Save Changes</button>
            </form>
        </div>

        <!-- Step 4: Success -->
        <div class="wizard-step <?php echo $current_step == 4 ? 'active' : ''; ?>">
            <h3>Changes Saved!</h3>
            <p>Access permissions have been successfully updated.</p>
            <a href="data_access.php">Return to data access</a>
        </div>
    </div>
</body>
</html> 