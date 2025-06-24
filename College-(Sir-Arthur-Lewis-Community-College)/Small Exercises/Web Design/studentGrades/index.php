<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Your Page Title</title>
</head>

<body>

    <br>

    <form action="grades.php" method="post">
               <label for="name" required>Enter your name: </label>
                    <input type="text" name="name">
                
                <label for="mgrade" required>Enter your Mathematics grade: </label>
                    <input type="number" name="mgrade">
                
            <label for="sgrade" required>Enter your Science grade: </label>
                    <input type="number" name="sgrade">
                
                <label for="egrade" required>Enter your English grade: </label>
                    <input type="number" name="egrade">
                
                <input type="Submit" value="Submit">


    </form>

</body>

</html>