<?php
// Start session
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin'])) {
    header('Location: index.php'); // Redirect to login if not logged in
    exit();
}

// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'news_blog');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize the post ID
    $postId = intval($_GET['id']);

    // Retrieve the image URL of the post
    $sql = "SELECT image_url FROM posts WHERE id = $postId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imagePath = $row['image_url'];

        // Delete the image file if it exists
        if (!empty($imagePath) && file_exists($imagePath)) {
            unlink($imagePath); // Delete the file
        }
    }

    // Delete the post from the database
    $sql = "DELETE FROM posts WHERE id = $postId";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the dashboard with a success message
        echo "<script>alert('Post and associated image deleted successfully'); window.location.href='dashboard.php';</script>";
    } else {
        // Redirect back to the dashboard with an error message
        echo "<script>alert('Error deleting post: " . $conn->error . "'); window.location.href='dashboard.php';</script>";
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect back to the dashboard if no ID is provided
    header('Location: dashboard.php?error=No post ID provided');
    exit();
}
?>