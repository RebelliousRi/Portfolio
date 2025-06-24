<?php
include 'includes/db_connect.php';

if (!isset($_GET['id'])) {
    die('Song ID not provided.');
}

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM songs WHERE id = $id");
header("Location: index.php");
?>
