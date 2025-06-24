<?php
include 'includes/db_connect.php';
$query = "SELECT songs.id, songs.title, songs.release_year, artists.name AS artist_name, artists.genre 
          FROM songs 
          JOIN artists ON songs.artist_id = artists.id";

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>My Music Collection</title>
</head>

<body>
    <h1>My Music Collection</h1>
    <a href="add_song.php">Add New Song</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>Title</th>
            <th>Year</th>
            <th>Artist</th>
            <th>Genre</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= $row['release_year'] ?></td>
                <td><?= htmlspecialchars($row['artist_name']) ?></td>
                <td><?= htmlspecialchars($row['genre']) ?></td>
                <td>
                    <a href="edit_song.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="delete_song.php?id=<?= $row['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>