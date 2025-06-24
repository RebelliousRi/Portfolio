<?php

if ($_SERVER ["REQUEST_METHOD"] == "POST"){
    
$age = $_POST["age"];

if ($age >= 21){

echo ('You are old enough to drink and vote in the US');

} else if ($age >= 18){

    echo ('You are old enough to vote in the US');

} else {

    echo ('You are not old enough to drink or vote in the US');

}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
</head>
<body>

<br>

<form action="age.php" method="post">

        <label for="age">Enter your age: </label>
        <input type="number" name="age" >
<input type="Submit">
    </form>




</body>
</html>
