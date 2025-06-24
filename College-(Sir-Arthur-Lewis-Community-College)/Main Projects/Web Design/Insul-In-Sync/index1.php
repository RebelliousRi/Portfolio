
<?php
include_once 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Diabetes Wellness Assistant</title>

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
            <a href="pressure.php">Blood Pressure Tracker</a>
            <a href="glucose.php">Blood Glucose Tracker</a>
            <a href="cholesterol.php">Blood Cholesterol Tracker</a>
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
    <h2>Welcome to the Diabetes Wellness Assistant</h2>
    <p>Manage your diabetes with ease using our accessible platform.</p>
    <nav>
        <ul>
            <li><a href="tools.php">Tools</a></li>
            <li><a href="education.php">Education</a></li>
            <li><a href="medical.php">Find Medical Professionals</a></li>
            <li><a href="account.php">Account</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact 911</a></li>
            <li><a href="login.php">Log in / Sign up</a></li>

            

        </ul>
    </nav>
</body>
</html>
