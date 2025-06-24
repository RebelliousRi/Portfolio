<?php

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

<form action="includes/signup.php" method="post">
        <table cellpadding="20">
            <tr>
                <td><label for="username" required>Enter your name: </label>
                    <input type="text" name="username">
                </td>
                <td><label for="pwd" required>Enter your password: </label>
                    <input type="password" name="pwd">
                </td>
                <td><label for="email" required>Enter your email: </label>
                    <input type="text" name="email">
                </td>
            </tr>
        </table>
<input type="Submit" value="Submit">
    </form>
    

</body>
</html>
