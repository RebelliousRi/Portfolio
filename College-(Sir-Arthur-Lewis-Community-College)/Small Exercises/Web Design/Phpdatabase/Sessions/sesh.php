<?php 

//Start session

session_start();

echo $_SESSION["username"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
</head>
<body>

<h2>Dashboard</h2>

<p>Welcome <?php= $_SESSION["username"]; ?></p>
    

</body>
</html>
