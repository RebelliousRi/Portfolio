<?php
include_once 'includes/config.php';


// Validate patient ID
if (!isset($_SESSION['patient_id'])) {
    // Try to get patient ID from the database using the logged-in username
    if (isset($_SESSION['username'])) {
        $sql = "SELECT id FROM patients WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['patient_id'] = $row['id'];
        }
        $stmt->close();
    }
}

// Handle access removal
if (isset($_POST['remove_access'])) {
    $caregiver_id = $_POST['caregiver_id'];
    $stmt = $conn->prepare("UPDATE grant_access SET access_glucose = 0, access_pressure = 0, access_cholesterol = 0 WHERE caregiver_id = ? AND patient_id = ?");
    $stmt->bind_param("ii", $caregiver_id, $_SESSION['patient_id']);
    $stmt->execute();
}

// Handle edit access redirect
if (isset($_POST['edit_access'])) {
    $_SESSION['caregiver_id'] = $_POST['caregiver_id'];
    $_SESSION['caregiver_name'] = $_POST['caregiver_name'];
    header("Location: edit_access.php");
    exit();
}

// Handle new access grant redirect
if (isset($_GET['new'])) {
    // Clear caregiver-related session variables
    unset($_SESSION['caregiver_id']);
    unset($_SESSION['caregiver_name']);
    header("Location: grant_access.php?step=1&new=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Access Management</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .access-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .access-table th, .access-table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .access-table th {
            background-color: #f5f5f5;
        }
        .access-badge {
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 0.9em;
        }
        .access-yes {
            background-color: #4CAF50;
            color: white;
        }
        .access-no {
            background-color: #f44336;
            color: white;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .action-buttons button {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .edit-btn {
            background-color: #2196F3;
            color: white;
        }
        .remove-btn {
            background-color: #f44336;
            color: white;
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
    <h2>Data Access Management</h2>
        <p>Manage which caregivers have access to your health data.</p>

        <table class="access-table">
            <thead>
                <tr>
                    <th>Caregiver Name</th>
                    <th>Glucose Access</th>
                    <th>Blood Pressure Access</th>
                    <th>Cholesterol Access</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT grant_access.*, care_givers.firstname, care_givers.lastname 
                        FROM grant_access 
                        JOIN care_givers ON grant_access.caregiver_id = care_givers.id 
                        WHERE grant_access.patient_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $_SESSION['patient_id']);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $caregiver_name = $row['firstname'] . ' ' . $row['lastname'];
                        echo "<tr>
                            <td>{$caregiver_name}</td>
                            <td><span class='access-badge " . ($row['access_glucose'] ? 'access-yes' : 'access-no') . "'>" . ($row['access_glucose'] ? 'Yes' : 'No') . "</span></td>
                            <td><span class='access-badge " . ($row['access_pressure'] ? 'access-yes' : 'access-no') . "'>" . ($row['access_pressure'] ? 'Yes' : 'No') . "</span></td>
                            <td><span class='access-badge " . ($row['access_cholesterol'] ? 'access-yes' : 'access-no') . "'>" . ($row['access_cholesterol'] ? 'Yes' : 'No') . "</span></td>
                            <td class='action-buttons'>
                                <form method='POST' style='display: inline;' onsubmit='return confirm(\"Are you sure you want to edit access for this caregiver?\");'>
                                    <input type='hidden' name='caregiver_id' value='{$row['caregiver_id']}'>
                                    <input type='hidden' name='caregiver_name' value='{$caregiver_name}'>
                                    <button type='submit' name='edit_access' class='edit-btn'>Edit Access</button>
                                </form>
                                <form method='POST' style='display: inline;' onsubmit='return confirm(\"Are you sure you want to remove all access for this caregiver?\");'>
                                    <input type='hidden' name='caregiver_id' value='{$row['caregiver_id']}'>
                                    <button type='submit' name='remove_access' class='remove-btn'>Remove Access</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No caregivers have access to your data. Grant access using the link below.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            <a href="grant_access.php?new=1" class="button">Grant Access to New Caregiver</a>
        </div>
    </div>
</body>
</html> 