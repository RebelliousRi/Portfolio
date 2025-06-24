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
    <title>Tropical Nomad Bookings</title>
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
          <a href="bookings.php"><u><strong>Bookings</strong></u></a>
          <a href="summary.php">Summary</a>
        </div>
      <li><a href="index1.php">Register</a></li>
      <li><a href="includes/logout.php">Log Out</a></li>
    </ul>
  </nav>

  <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

  <h2>Bookings Records Management</h2>

  <table>
    <tr>
        <th>ID</th>
        <th>Tour ID</th>
        <th>Customer ID</th>
        <th>Booking Date</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

<?php
$sql = "SELECT * FROM bookings";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['tour_id']}</td>
            <td>{$row['customer_id']}</td>            
            <td>{$row['booking_date']}</td>
            <td>{$row['status']}</td>
            <td>
                <a href='includes/Edit-Delete/edit_customers.php?id={$row['id']}'>Edit</a> | 
                <a href='includes/Edit-Delete/delete_customers.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this customer?');\">Delete</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No records found</td></tr>";
}
?>
</table>

  </body>
</html>