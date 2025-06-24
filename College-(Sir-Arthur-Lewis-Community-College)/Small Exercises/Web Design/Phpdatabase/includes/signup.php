<?php

include 'config.php';

$username = $_POST["username"];
$pwd = $_POST["pwd"];
$email = $_POST["email"];


$sql = "INSERT INTO users(username, pwd, email)

VALUES(

    '$username',
    '$pwd',
    '$email'
    
    )";

$result = mysqli_query($conn, $sql);

if ($result){

    echo "You signed in successfully! Welcome " . $username .  "<br>";
    
}else{ 
    
    echo "Sign in was unsuccesful please try again " . $username . mysqli_error($conn) . "<br>";

}



?>