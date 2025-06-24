<?php

include 'config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
</head>
<body>


<?php

$sql = "INSERT INTO users(username, pwd, email)

VALUES(

    'Ava',
    '111',
    'ava@gmail.com'
    
    )";

$result = mysqli_query($conn, $sql);

if ($result){

    echo "New record created successfully <br>";
    
}else{ 
    
    echo "New record not created" . mysqli_error($conn) . "<br>";

}

?>

</body>
</html>
