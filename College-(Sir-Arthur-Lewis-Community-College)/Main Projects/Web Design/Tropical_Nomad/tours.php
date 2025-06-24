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
    <title>Tropical Nomad Tours</title>
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
          <a href="tours.php"><u><strong>Tours</strong></u></a>
          <a href="customers.php">Customers</a>
          <a href="bookings.php">Bookings</a>
          <a href="summary.php">Summary</a>
        </div>
      <li><a href="index1.php">Register</a></li>
      <li><a href="includes/logout.php">Log Out</a></li>
    </ul>
  </nav>

<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

  <h2>Tour Records Management</h2>


  <table>
    <tr>
        <th>ID</th>
        <th>Type ID</th>
        <th>Tour Name</th>
        <th>Description</th>
        <th>Date</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>

<?php
$sql = "SELECT * FROM tours";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['type_id']}</td>
            <td>{$row['tour_name']}</td>
            <td>{$row['description']}</td>
            <td>{$row['tour_date']}</td>
            <td>{$row['price']}</td>
            <td>
                <a href='includes/Edit-Delete/edit_tours.php?id={$row['id']}'>Edit</a> | 
                <a href='includes/Edit-Delete/delete_tours.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this tour?');\">Delete</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No records found</td></tr>";
}
?>
</table>


<table>
    <tr>
        <th>ID</th>
        <th>Type Name</th>
        <th>Actions</th>
    </tr>

<?php
$sql = "SELECT * FROM tour_types";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['type_name']}</td>
            <td>
                <a href='includes/Edit-Delete/edit_tour_types.php?id={$row['id']}'>Edit</a> | 
                <a href='includes/Edit-Delete/delete_tour_types.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this tour type?');\">Delete</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='3'>No records found</td></tr>";
}
?>
</table>


  </body>


</html>
