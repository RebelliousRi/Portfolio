<?php

include_once 'includes/config.php';

//Yeets non admin users back to the login page :3

if (!isset($_SESSION['username'])) {

    header("Location: http://localhost/Xamp/Assignments/PHP-SQL_Project/index1.php?message=Only logged in administrators can access this page.");
    
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tropical Nomad Administrator Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<nav id="navbar">
    <div class="logo">
      <a href="index1.php"><img src="logo.png" alt="Campus Eats logo"></a>
      <a href="index1.php">Tropical Nomad</a>
    </div>
    <ul>
    
      <li class="dropdown">
        <a href="dashboard.php"><u><strong>Dashboard</strong></u></a>
        <div class="dropdown-content">
          <a href="tours.php">Tours</a>
          <a href="customers.php">Customers</a>
          <a href="bookings.php">Bookings</a>
          <a href="summary.php">Summary</a>
        </div>
      <li><a href="index1.php">Register</a></li>
      <li><a href="includes/logout.php">Log Out</a></li>
    </ul>
  </nav>

        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

        <h2>Administrator Dashboard</h2>

<ul>
    <li><a href="tours.php">Manage Tours</a></li>
    <li><a href="customers.php">Manage Customers</a></li>
    <li><a href="bookings.php">Manage Bookings</a></li>
    <li><a href="summary.php">View Booking Summary</a></li>
</ul>

</body>
</html>



