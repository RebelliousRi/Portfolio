<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punishment Lines</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Creepster&display=swap">
</head>

<body>

    <br>
            <h1>PUNISHMENT REPEATER!!!</h1><br>
            <h3>Enter the line and the number of times you want it to be repeated to receive your punishment!!!</h3><br>
    <form action="punishment.php" method="post">
        <table cellpadding="20" width = 100%>

            <tr>
                <td><label for="line" required>Enter the line: </label>
                    <input type="text" name="line">
                </td>
                <td><label for="num" required>Enter the number: </label>
                    <input type="number" name="num">
                </td>
            </tr>
        </table>
<input type="Submit" value="Submit"></td>
    </form>

</body>

</html>