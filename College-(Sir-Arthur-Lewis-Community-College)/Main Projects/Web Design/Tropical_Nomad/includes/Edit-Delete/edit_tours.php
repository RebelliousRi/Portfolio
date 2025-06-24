<?php

include_once 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the tour
    $sql = "SELECT * FROM tours WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $tour = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $type_id = (int)$_POST['type_id'];
    $tour_name = mysqli_real_escape_string($conn, $_POST['tour_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $tour_date = $_POST['tour_date'];
    $price = (float)$_POST['price'];
    

    $update_sql = "UPDATE tours SET 
        type_id='$type_id', 
        tour_name='$tour_name', 
        description='$description', 
        tour_date='$tour_date', 
        price='$price' 
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
    Type ID: <input type="number" name="type_id" value="<?php echo $tour['type_id']; ?>"><br><br>
    Name: <input type="text" name="tour_name" value="<?php echo $tour['tour_name']; ?>"><br><br>
    Description: <input type="text" name="description" value="<?php echo $tour['description']; ?>"><br><br>
    Date: <input type="date" name="tour_date" value="<?php echo $tour['tour_date']; ?>"><br><br>
    Price: <input type="text" name="price" value="<?php echo $tour['price']; ?>"><br><br>
    <button type="submit">Update</button>
</form>
