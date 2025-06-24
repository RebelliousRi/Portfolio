<?php

include 'config.php';

session_start();

$username = $_POST["username"];
$pwd = $_POST["pwd"];

$sql = "SELECT*FROM users
WHERE username = '$username' 
AND pwd = '$pwd'";



$login = mysqli_query($conn, $sql);

$logincheck = mysqli_num_rows($login);

if ($logincheck == 1){
    $_SESSION["username"]=$username;
    header("Location ../sesh.php");


}else {
    
    echo "Invalid user name or password";

}


?>