<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diabetes Education</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .nav-links {
            text-align: center;
            margin-bottom: 20px;
        }

        .nav-links a {
            color: #4CAF50;
            text-decoration: none;
            margin: 0 10px;
            padding: 5px 10px;
            border-radius: 4px;
            background-color: white;
        }

        .nav-links a:hover {
            background-color: #e8f5e9;
        }

        .box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h1 {
            color: #4CAF50;
            text-align: center;
        }

        .resource-list {
            list-style: none;
            padding: 0;
        }

        .resource-list li {
            margin-bottom: 15px;
        }

        .resource-list a {
            color: #4CAF50;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        .resource-list a:hover {
            background-color: #e8f5e9;
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


    <div class="nav-links">
        <a href="reminder.html">Reminders</a>
        <a href="education.html">Education</a>
        <a href="widget.html">Accessibility</a>
    </div>

    <h2>Diabetes Education Center</h2>

    <div class="box">
        <h2>Quick Resources</h2>
        <ul class="resource-list">
            <li>
                <a href="https://diabetes.org/" target="_blank">
                    American Diabetes Association
                </a>
            </li>
            <li>
                <a href="https://www.cdc.gov/diabetes/basics/diabetes.html" target="_blank">
                    CDC: What is Diabetes?
                </a>
            </li>
            <li>
                <a href="https://www.niddk.nih.gov/health-information/diabetes/overview/what-is-diabetes" target="_blank">
                    NIDDK Overview
                </a>
            </li>
        </ul>
    </div>

    <div class="box">
        <h2>Understanding Diabetes</h2>
        <ul class="resource-list">
            <li><a href="#">Types of Diabetes</a></li>
            <li><a href="#">Blood Sugar Management</a></li>
            <li><a href="#">Healthy Eating Guide</a></li>
            <li><a href="#">Exercise and Diabetes</a></li>
        </ul>
    </div>

    <div class="box">
        <h2>Daily Management</h2>
        <ul class="resource-list">
            <li><a href="#">Blood Glucose Monitoring</a></li>
            <li><a href="#">Medication Management</a></li>
            <li><a href="#">Meal Planning</a></li>
            <li><a href="#">Physical Activity Tips</a></li>
        </ul>
    </div>
</body>
</html>