<?php

include 'config.php';

$username = $_POST["username"];
$pwd = $_POST["pwd"];

$sql = "DELETE FROM users
WHERE 
username = '$username'
AND pwd = '$pwd'";

$result = mysqli_query($conn, $sql);

if ($result){

    echo "You deleted your account successfully. We're sad to see you go " . $username .  "<br>";
    
}else{ 
    
    echo "Deletion was unsuccesful please try again " . $username . mysqli_error($conn) . "<br>";

}



?>