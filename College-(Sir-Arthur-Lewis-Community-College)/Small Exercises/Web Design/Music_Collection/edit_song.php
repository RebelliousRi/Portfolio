<?php
include 'includes/db_connect.php';

// Get the song ID from the URL
$id = $_GET['id'];

// Fetch the current song info with artist details using a JOIN
$song_query = mysqli_query($conn, "
    SELECT songs.*, artists.name AS artist_name 
    FROM songs 
    JOIN artists ON songs.artist_id = artists.id 
    WHERE songs.id = $id
");
$song = mysqli_fetch_assoc($song_query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form values
    $title = $_POST['title'];
    $year = $_POST['release_year'];
    $artist_name = $_POST['artist_name'];

    // Find the artist ID by name (case-sensitive match)
    $artist_query = mysqli_query($conn, "SELECT id FROM artists WHERE name = '$artist_name'");
    
    if (mysqli_num_rows($artist_query) > 0) {
        $artist = mysqli_fetch_assoc($artist_query);
        $artist_id = $artist['id'];

        // Update the song in the database
        $update = "UPDATE songs SET title = '$title', release_year = '$year', artist_id = '$artist_id' WHERE id = $id";
        mysqli_query($conn, $update);

        // Redirect after update
        header("Location: index.php");
    } else {
        echo "<p style='color:red;'>❌ Artist not found. Please type a valid artist name.</p>";
    }
}
?>

<h1>Edit Song</h1>
<form method="POST">
    Title: <input type="text" name="title" value="<?= htmlspecialchars($song['title']) ?>" required><br><br>
    Release Year: <input type="number" name="release_year" value="<?= $song['release_year'] ?>" required><br><br>
    Artist Name: <input type="text" name="artist_name" value="<?= htmlspecialchars($song['artist_name']) ?>" required><br><br>
    <button type="submit">Update</button>
</form>
