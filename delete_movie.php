<?php
// Include the database configuration file
include 'config.php';

// Check if movie ID is set
if (isset($_POST['movie_id'])) {
    $movie_id = $_POST['movie_id'];

    // Prepare and execute the delete query
    $sql = "DELETE FROM movies WHERE id = :movie_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['movie_id' => $movie_id]);

    // Redirect back to the homepage after deletion
    header("Location: index.php");
    exit;
} else {
    echo "Invalid movie ID.";
}
?>
