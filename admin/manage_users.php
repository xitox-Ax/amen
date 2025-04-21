<?php
// Start session
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin'])) {
    header('Location: index.php'); // Redirect to login if not logged in
    exit();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'news_blog');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle admin deletion
if (isset($_GET['delete_id'])) {
    $adminId = intval($_GET['delete_id']);
    $sql = "DELETE FROM admin WHERE id = $adminId";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Admin deleted successfully'); window.location.href='manage_users.php';</script>";
    } else {
        echo "<script>alert('Error deleting admin: " . $conn->error . "');</script>";
    }
}

// Handle adding a new admin
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_admin'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = md5($_POST['password']); // Using MD5 for password hashing

    $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Admin added successfully'); window.location.href='manage_users.php';</script>";
    } else {
        echo "<script>alert('Error adding admin: " . $conn->error . "');</script>";
    }
}

// Fetch all admins
$sql = "SELECT id, username FROM admin";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admins</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #004080;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #004080;
            color: #fff;
        }
        .actions a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            color: #fff;
        }
        .actions .delete {
            background-color: red;
        }
        .actions .delete:hover {
            background-color: darkred;
        }
        .add-admin {
            display: block;
            text-align: center;
            margin: 20px 0;
            text-decoration: none;
            background-color: #004080;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
        }
        .add-admin:hover {
            background-color: #003366;
        }
        form {
            margin-top: 20px;
        }
        form input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form button {
            background-color: #004080;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #003366;
        }
                fieldset {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        legend {
            font-size: 18px;
            font-weight: bold;
            color: #004080;
            padding: 5px 10px;
            border: 1px solid #004080;
            border-radius: 5px;
            background-color: #f4f4f9;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="container">
    <img src="logo1.png" alt="Logo" style="width: 200px; height: 50px; margin-bottom: 20px;">

        <h1>Manage Admins</h1>

        <!-- Add Admin Form -->
  <a href="dashboard.php" style="display: inline-flex; align-items: center; text-decoration: none; background-color: #004080; color: #fff; padding: 10px 15px; border-radius: 5px; font-size: 16px; text-align: center; margin: 4px"> Go Back</a>    

        <form method="POST" action="">
            <fieldset>
            <legend>Add New Admin User</legend>
            <input type="text" name="username" placeholder="Enter username" required>
            <input type="password" name="password" placeholder="Enter password" required>
            <button type="submit" name="add_admin">Add Admin</button>
            </fieldset>
        </form>

        <!-- Admins Table -->
        <fieldset>
            <legend>Active Users</legend>
            <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td class="actions">
                        <a href="manage_users.php?delete_id=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this admin?');">Delete</a>
                    </td>
                    </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align: center;">No admins found</td>
                </tr>
                <?php endif; ?>
            </tbody>
            </table>
        </fieldset>
    </div>
    <footer style="text-align: center; margin-top: 20px; padding: 10px; background-color: #004080; color: #fff; border-radius: 8px;">
        <p>&copy; <?php echo date('Y'); ?> News Blog Admin Panel. All Rights Reserved.</p>
    </footer>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>