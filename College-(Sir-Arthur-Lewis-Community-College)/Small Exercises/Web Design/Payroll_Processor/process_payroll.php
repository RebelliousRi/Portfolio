

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

    $name = $_POST["name"];
    $pay = $_POST["pay"];
    $hours = $_POST["hours"];

    if (empty($name) || empty($pay) || empty($hours)) {

        echo ("Input fields cannot be left blank");

    } else {

        if ($hours <= 40) {

            $rpay = $hours * $pay;
            $opay = 0;

        } else if ($hours > 40) {

            $rpay = 40 * $pay;
            $opay = ($hours - 40) * $pay * 1.5;

        }

        if ($hours <= 40) {

            $rpay = $hours * $pay;
            $opay = 0;

        }

        $tpay = $rpay + $opay;

        echo ("Employee Name: " . $name . "<br/><br/>");
        echo ("Regular Pay: $" . $rpay . "<br/><br/>");
        echo ("Overtime Pay: $" . $opay . "<br/><br/>");
        echo ("Total Pay: $" . $tpay . "<br/><br/>");
    }
}

?>

</body>

</html>