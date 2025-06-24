<?php

include 'config.php';

$username = $_POST["username"];
$pwd = $_POST["pwd"];
$email = $_POST["email"];

$sql = "UPDATE users SET 
        pwd = '$pwd', 
        email = '$email'
        WHERE username = '$username'";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "You updated your information successfully, " . ($username) . "!";
} else {
    echo "Update was unsuccessful. Please try again, " . ($username) . ". Error: " . mysqli_error($conn);
}
?>
