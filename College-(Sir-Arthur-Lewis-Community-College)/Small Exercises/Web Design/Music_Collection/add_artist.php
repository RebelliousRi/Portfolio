<?php
include 'includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $genre = $_POST['genre'];
    $insert = "INSERT INTO artists (name, genre) VALUES ('$name', '$genre')";
    mysqli_query($conn, $insert);
    echo "<p>✅ Artist added successfully. You can now close this tab and return to the song form.</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Artist</title>
</head>
<body>
    <h1>Add a New Artist</h1>
    <form method="POST">
        Artist Name: <input type="text" name="name" required><br><br>
        Genre: <input type="text" name="genre" required><br><br>
        <button type="submit">Add Artist</button>
    </form>
</body>
</html>
