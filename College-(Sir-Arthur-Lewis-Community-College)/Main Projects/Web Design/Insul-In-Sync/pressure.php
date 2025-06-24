<?php

include_once 'includes/config.php';
require_once 'includes/encryption.php';
require_once 'includes/encryption_config.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Pressure Log</title>

<link rel="stylesheet" href="styles.css">

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
    
<form method="post" action="includes/pressure.php">

<fieldset>
  <legend><h3>Blood Pressure Log</h3></legend>
  <table width="100%" cellpadding="10">
    <tr align="center">
    <td width="25%">
        <br>
    <label for="systolic" required>Enter your systolic pressure: </label><br><br>
            <input type="number" step="0.01" name="systolic" required>
        </td>
        <td width="25%">
        <br>
    <label for="diastolic" required>Enter your diastolic pressure: </label><br><br>
            <input type="number" step="0.01" name="diastolic" required>
        </td>
        <td width="25%">
        <br>
    <label for="heart_rate" required>Enter your heart rate: </label><br><br>
            <input type="number" step="0.01" name="heart_rate" required>
        </td>
        </td>
              <td width="25">
                <div style=" margin-top: 20px; margin-left: 50px; margin-right: 20px;">
                <label for="time">Time:</label><br /><br />
                <input required type="datetime-local" name="time" />
              </td></div>
    </tr>
    <tr>
<td colspan="4" style="text-align: center; padding-top: 20px;">
<button name="submit" type="submit">Submit</button>
</td>
</tr>
  </table>
</fieldset>

</form>


<fieldset>
  <legend><h3>Blood Pressure Tracker</h3></legend>
  <table width="100%" cellpadding="10">
  <tr>
        <th>Systolic</th>
        <th>Diastolic</th>
        <th>Heart Rate</th>
        <th>Date and Time</th>
        <th>Actions</th>
    </tr>

<?php
// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM patient_pressure WHERE patient_id = ?");
$stmt->bind_param("i", $_SESSION['patient_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Decrypt each value individually
        $decryptedSystolic = decryptData($row['systolic']);
        $decryptedDiastolic = decryptData($row['diastolic']);
        $decryptedHeartRate = decryptData($row['heart_rate']);

        echo "<tr>
            <td>{$decryptedSystolic}</td>
            <td>{$decryptedDiastolic}</td>
            <td>{$decryptedHeartRate}</td>
            <td>{$row['time']}</td>            
        <td>
            <a href='includes/Edit-Delete/edit_customers.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to edit this record?');\">Edit</a> | 
            <a href='includes/Edit-Delete/delete_customers.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
        </td>
    </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No records found. Start adding your blood pressure readings above.</td></tr>";
}
$stmt->close();
?>
  </table>
</fieldset>

</body>
</html>


