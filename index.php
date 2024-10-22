<?php
// Include the database configuration file
include 'config.php';

// Fetch movies from the database
$sql = "SELECT * FROM movies";
$stmt = $conn->query($sql);
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>MovieList</title>
</head>
<body>
    <h1>Movie List</h1>
    <hr>

    <a href="add_mov.php">Add New Movie</a><br><br>

    <?php if (count($movies) > 0): ?>
        <ul>
            <?php foreach ($movies as $movie): ?>
                <li>
                    <strong><?php echo htmlspecialchars($movie['title']); ?></strong> (<?php echo $movie['release_year']; ?>)<br>
                    Director: <?php echo htmlspecialchars($movie['director']); ?><br>
                    Genre: <?php echo htmlspecialchars($movie['genre']); ?><br>
                    Rating: <?php echo $movie['rating']; ?>/10<br>
                    Description: <?php echo htmlspecialchars($movie['description']); ?><br>

                    <!-- Delete Button -->
                    <form method="post" action="delete_movie.php" style="display:inline;">
                        <input type="hidden" name="movie_id" value="<?php echo $movie['id']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </li><br>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No movies found.</p>
    <?php endif; ?>
</body>
</html>
