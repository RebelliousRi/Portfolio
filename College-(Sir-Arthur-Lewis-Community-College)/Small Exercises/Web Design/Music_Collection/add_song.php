<?php
include 'includes/db_connect.php';
$artists = mysqli_query($conn, "SELECT * FROM artists");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $year = $_POST['release_year'];
    $artist_id = $_POST['artist_id'];
    $insert = "INSERT INTO songs (title, release_year, artist_id) VALUES ('$title', '$year', '$artist_id')";
    mysqli_query($conn, $insert);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Song</title>
</head>

<body>
    <h1>Add a New Song</h1>
    <form method="POST">
        Title: <input type="text" name="title" required><br><br>
        Release Year: <input type="number" name="release_year" required><br><br>
        Artist:
        <select name="artist_id" required>
            <?php while ($artist = mysqli_fetch_assoc($artists)): ?>
                <option value="<?= $artist['id'] ?>"><?= htmlspecialchars($artist['name']) ?></option>
            <?php endwhile; ?>
        </select><br><br>
        <p><a href="add_artist.php" target="_blank">+ Add new artist</a></p>

        <button type="submit">Add Song</button>
    </form>
</body>

</html>