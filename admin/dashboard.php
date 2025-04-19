<!-- filepath: c:\Users\User\Desktop\amen\admin\dashboard.php -->
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php'); // Redirect to login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .dashboard {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .dashboard h1 {
            color: #004080;
        }
        .dashboard a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #004080;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        .dashboard a:hover {
            background-color: #003366;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Welcome, Admin</h1>
        <p>Use the options below to manage your blog:</p>
        <a href="create_post.php">Create New Post</a>
        <a href="logout.php" style="background-color: red;">Logout</a>
    </div>
</body>
</html>