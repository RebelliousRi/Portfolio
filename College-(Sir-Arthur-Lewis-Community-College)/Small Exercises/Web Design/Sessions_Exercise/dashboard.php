<?php

session_start();

if (!isset($_SESSION["username"])) {

    header("Location: login.php?message=Please log in to access the dashboard.");
    
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Secret Web Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap">
</head>
<body class="dashboard">

<h1>Super Secret Web Dashboard</h1>

<?php

echo ("<h3>Login Successful! Welcome, " .$_SESSION["username"]. "!</h3> <br>");

?>

<video autoplay loop muted playsinline>
    <source src="dashboard.mp4" type="video/mp4">
</video>


<a href="logout.php">

<button>Log Out</button>

</a>

</body>
</html>