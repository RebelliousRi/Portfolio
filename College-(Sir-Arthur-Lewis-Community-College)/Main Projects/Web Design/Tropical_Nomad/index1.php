<?php

include_once 'includes/config.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tropical Nomad Administrator Login / Registration</title>
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
          <a href="summary.php">Summary</a>
        </div>
      <li><a href="index1.php"><u><strong>Register</strong></u></a></li>
      <li><a href="includes/logout.php">Log Out</a></li>
    </ul>
  </nav>

  <?php

if (isset($_SESSION['username'])) {

    echo "<h2>Welcome " . $_SESSION['username'] . "!</h2>";

} 

?>
        <h2>Administrator Login / Registration</h2>

        <p>Please note only logged in administrators can register new admins.</p><br><br>
        
        <form method="post">

        <table cellpadding="20">
            <tr>
                <td><label for="username" required>Enter your username: </label>
                    <input type="text" name="username">
                </td>
                <td><label for="pwd" required>Enter your password: </label>
                    <input type="password" name="pwd">
                </td>
            </tr>
        </table>
            <button type="submit" formaction="includes/login.php">Log in</button>
            <button type="submit" formaction="includes/register.php">Register</button>
    </form>

</body>
</html>
