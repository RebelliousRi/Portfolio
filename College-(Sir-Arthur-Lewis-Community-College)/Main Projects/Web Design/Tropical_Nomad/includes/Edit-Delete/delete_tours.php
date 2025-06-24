<?php

include_once 'config.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    
    $sql = "DELETE FROM tours WHERE id=$id";

    if (mysqli_query($conn, $sql)) {

        header("Location: http://localhost/Xamp/Assignments/PHP-SQL_Project/tours.php?message=Tour deleted successfully!");

        exit();

    } else {
        echo "Record was not deleted due to an error: " . mysqli_error($conn);
    }
}
?>
