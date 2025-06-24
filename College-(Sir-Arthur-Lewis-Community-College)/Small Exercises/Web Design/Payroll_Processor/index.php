<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Processor</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <br>

    <form action="process_payroll.php" method="post">
        <table cellpadding="20">
            <h1>Employee Payroll Processor</h1><br>
            <h3>Please enter your information to calculate your pay.</h3><br>
            <tr>
                <td><label for="name" required>Enter your name: </label>
                    <input type="text" name="name">
                </td>
                <td><label for="pay" required>Enter your pay rate: </label>
                    <input type="number" name="pay">
                </td>
                <td><label for="hours" required>Enter the hours you work: </label>
                    <input type="number" name="hours">
            </tr>
        </table>
<input type="Submit" value="Submit"></td>
    </form>

</body>

</html>