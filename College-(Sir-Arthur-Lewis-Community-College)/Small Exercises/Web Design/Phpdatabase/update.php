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

<h2>Update</h2>

<form action="includes/update_data.php" method="post">
    <table cellpadding="20">
        <tr>
            <td>
                <label for="username">Enter your name: </label>
                <input type="text" id="username" name="username" required>
            </td>
            <td>
                <label for="pwd">Enter your password: </label>
                <input type="password" id="pwd" name="pwd" required>
            </td>
            <td>
                <label for="email">Enter your email: </label>
                <input type="email" id="email" name="email" required>
            </td>
        </tr>
    </table>
    <input type="submit" value="Update">
</form>

<h2>Delete</h2>

<form action="includes/delete_data.php" method="post">
    <table cellpadding="20">
        <tr>
            <td>
                <label for="username">Enter your name: </label>
                <input type="text" id="name_delete" name="username" required>
            </td>
            <td>
                <label for="pwd">Enter your password: </label>
                <input type="password" id="pwd" name="pwd" required>
            </td>
        </tr>
    </table>
    <input type="submit" value="Delete">
</form>

</body>
</html>