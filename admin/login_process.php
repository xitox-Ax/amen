<?php
session_start();

// Database connection
$host = 'localhost';
$username = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password
$dbname = 'news_blog';

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    // Query to check admin credentials
    $sql = "SELECT * FROM admin WHERE username = ? AND password = MD5(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $admin_username, $admin_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['admin'] = $admin_username;
        header('Location: dashboard.php'); // Redirect to admin dashboard
        exit();
    } else {
        $error = 'Invalid username or password.';
    }
}
?>