<?php

include_once 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tour_types WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $tour_type = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $type_name = mysqli_real_escape_string($conn, $_POST['type_name']);

    $update_sql = "UPDATE tour_types SET 
    type_name='$type_name' 
    WHERE id='$id'";

    if (mysqli_query($conn, $update_sql)) {

        header("Location: http://localhost/Xamp/Assignments/PHP-SQL_Project/tours.php?message=Tour updated successfully!");

        exit();

    } else {
        echo "Record was not updated due to an error: " . mysqli_error($conn);
    }
}
?>

<h2>Edit Tour</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $tour['id']; ?>">
    Type Name: <input type="text" name="type_name" value="<?php echo $tour_type['type_name']; ?>"><br><br>
    <button type="submit">Update</button>
</form>
