<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Pay</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Creepster&display=swap">
</head>

<body>
    
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $line = $_POST["line"];
    $num = $_POST["num"];

    if (empty($line) || empty($num)) {

        for ($num=0;$num<100;$num++){

        echo ("ENTER YOUR LINE TO BE PUNISHED!!! <br>");

        }

    } else {

 
        for ($x=0;$x<$num;$x++){

            echo ($x+1) . ". " . $line . "<br>";
    
            }

            echo ("<br> Good job! You survived your punishment!");

    }
}



?>

</body>

</html>