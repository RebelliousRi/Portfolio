<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Pay</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $num = $_POST["num"];

    if (empty($num)) {

        echo "Input fields cannot be left blank";

    } else {

        $num2 = 1;

        echo "Number " . $num . " Multiplication Table <br><br>";
 
        for ($x=0;$x<12;$x++){

            $product = $num*$num2;

            echo $num . "*" . $num2 . " = " . $product . "<br>";

            $num2++;

        }

    }
}



?>

</body>

</html>