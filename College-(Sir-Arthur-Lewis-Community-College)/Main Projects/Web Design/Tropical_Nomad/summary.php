<?php

include_once 'includes/config.php';

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
    <title>Tropical Nomad Summary</title>
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
        <a href="dashboard.php">Dashboard</a>
        <div class="dropdown-content">
          <a href="tours.php">Tours</a>
          <a href="customers.php">Customers</a>
          <a href="bookings.php">Bookings</a>
          <a href="summary.php"><u><strong>Summary</strong></u></a>
        </div>
      <li><a href="index1.php">Register</a></li>
      <li><a href="includes/logout.php">Log Out</a></li>
    </ul>
  </nav>

  <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

<h2>Record Summary</h2>

  <?php

// SQL query to join the bookings, customers, and tours tables
$sql = "SELECT 
            bookings.id AS booking_id,
            customers.fname,
            customers.lname,
            customers.email,
            tours.tour_name,
            tours.tour_date,
            bookings.booking_date,
            bookings.status
        FROM bookings
        JOIN customers ON bookings.customer_id = customers.id
        JOIN tours ON bookings.tour_id = tours.id
        ORDER BY bookings.booking_date DESC";

$result = mysqli_query($conn, $sql);
?>

<table>
    <tr>
        <th>Booking ID</th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Tour Name</th>
        <th>Tour Date</th>
        <th>Booking Date</th>
        <th>Status</th>
    </tr>

<?php
if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>
            <td>{$row['booking_id']}</td>
            <td>{$row['fname']} {$row['lname']}</td>
            <td>{$row['email']}</td>
            <td>{$row['tour_name']}</td>
            <td>{$row['tour_date']}</td>
            <td>{$row['booking_date']}</td>
            <td>{$row['status']}</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No records found</td></tr>";
}
?>
</table>


  </body>
</html>