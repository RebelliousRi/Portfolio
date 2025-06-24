<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Secret Web Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap">
</head>
<body>

<h1>Super Secret Web Login</h1>

<h3>Enter your Super Secret username and password to enter the Super Secret Web!</h3>

<form action="login_con.php" method="post">
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
<input type="Submit" value="Submit"></td>
    </form>
    

</body>
</html>