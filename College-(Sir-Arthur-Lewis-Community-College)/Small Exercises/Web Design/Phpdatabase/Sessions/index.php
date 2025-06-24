<?php 

//Start session

session_start();

/*
$_SESSION["username"]="Lisa";
$_SESSION["pwd"]="456";

//Deletes session data for one variable

unset($_SESSION["pwd"]);

//Deletes session data for all session variables

session_unset();

//Kills the session entireley

session_destroy();

echo $_SESSION["username"];

*/


include_once 'includes/config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
</head>
<body>

<h2>Sign Up</h2>

<form action="includes/login.php" method="post">
        <table cellpadding="20">
            <tr>
                <td><label for="username" required>Enter your name: </label>
                    <input type="text" name="username">
                </td>
                <td><label for="pwd" required>Enter your password: </label>
                    <input type="password" name="pwd">
                </td>
            </tr>
        </table>
<input type="Submit" value="Submit"></td>
    </form>
    

</body>
</html>
