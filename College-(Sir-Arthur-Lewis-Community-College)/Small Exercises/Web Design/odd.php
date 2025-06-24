

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Pay</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<form action="odd.php" method="post">


<label for="num" required>Enter a number: </label>
<input type="number" name="num">

</form>

    
<?php

$access = "no";
/*
    do {
        $num = $_POST["num"];

        if (empty($num)) {
            echo "Input field cannot be left blank.<br>";

        } else {
                        if ($num % 2 === 0) {
                echo "Access denied. You entered an even number. Please try again.<br>";
            } else {
                echo "Access granted. Welcome Arianna!";
                $access = "yes";
            }
        }
    } while ($access != "yes");
*/



while ($access = "no"){

    $num = $_POST["num"];

    if (empty($num)) {
        echo "Input field cannot be left blank.<br>";

    } else {
                    if ($num % 2 === 0) {
            echo "Access denied. You entered an even number. Please try again.<br>";
        } else {
            echo "Access granted. Welcome Arianna!";
            $access = "yes";
        }
    }


}

?>

</body>



            



</html>