<?php
include 'config.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $director = $_POST['director'];
    $release_year = $_POST['release_year'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];
    $description = $_POST['description'];

    // Insert the movie into the database
    $sql = "INSERT INTO movies (title, director, release_year, genre, rating, description)
            VALUES (:title, :director, :release_year, :genre, :rating, :description)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['title' => $title, 'director' => $director, 'release_year' => $release_year, 'genre' => $genre, 'rating' => $rating, 'description' => $description]);
    echo '<a href="index.php">Back to Movie List</a><br><br>';
    echo "Movie added successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Movie</title>
</head>
<body>
    <h1>Add a New Movie</h1>
    <form method="post" action="add_mov.php">
        <label>Title:</label>
        <input type="text" name="title" required><br><br>

        <label>Director:</label>
        <input type="text" name="director" required><br><br>

        <label>Release Year:</label>
        <input type="number" name="release_year" required><br><br>

        <label>Genre:</label>
        <input type="text" name="genre" required><br><br>

        <label>Rating (0-10):</label>
        <input type="number" step="0.1" name="rating" required><br><br>

        <label>Description:</label>
        <textarea name="description"></textarea><br><br>

        <input type="submit" value="Add Movie">
    </form>
</body>
</html>
