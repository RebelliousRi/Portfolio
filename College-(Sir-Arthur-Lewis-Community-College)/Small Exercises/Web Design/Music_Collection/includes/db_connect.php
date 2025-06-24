<?php
$conn = mysqli_connect("localhost", "root", "", "1my_music_collection");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
