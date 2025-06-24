<?php

session_start();

//SSW-Al-In-Ice
$ValidUser = [
"username" => "Alice",
"pwd" => "123",
];
   

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 $username = $_POST["username"];
    $pwd = $_POST["pwd"];   

    $_SESSION["username"]=$ValidUser["username"];


if (empty("username") || empty("pwd")) {
    
echo ("Input fields cannot be left blank.");


} 

else {

    if ($username === $ValidUser["username"] && $pwd === $ValidUser["pwd"]){

header("Location: http://localhost/Xamp/Sessions_Exercise/dashboard.php");

exit;

    }

    else if ($username != $ValidUser["username"]) {

        echo ("<h3>Invalid password. <br> Are you sure you're a member of the Super Secret Web? <br> If you aren't youre in trouble because we will find you :) </h3>");

    }

    else if ($pwd != $ValidUser["pwd"]) {

        echo ("<h3>Invalid password. <br> Are you sure you're a member of the Super Secret Web? <br> If you aren't youre in trouble because we will find you :) </h3>");

    }

}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Secret Web Exit</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap">
</head>

<a href="https://www.google.com/GET_LOST_NORMIE!!!">

<button>Leave Forever!</button>

</a>

</html>