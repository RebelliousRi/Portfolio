<?php

$ValidUser = [
"email" => "alice@gmail.com",
"password" => "123", 
];
    
    $name = "Alice";
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email === $ValidUser["email"] && $password === $ValidUser["password"]){

echo ("Login Successful! Welcome, " .$name. ".");

    }

    else {

        echo ("Invalid email or password. Please try again.");

    }


?>