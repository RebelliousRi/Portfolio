<?php

include_once 'includes/config.php';

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

$sql = "SELECT*FROM users";
$result = mysqli_query($conn, $sql);

$resultcheck = mysqli_num_rows($result);

if ($resultcheck > 0){

while ($row = mysqli_fetch_assoc($result))

    echo $row['username'] . "<br>";

}else {
    
    echo "No records found";

}

?>

</body>
</html>
