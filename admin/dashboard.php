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
    <div class="top-bar">
        <h1>Admin Dashboard</h1>
        <a href="logout.php" class="logout">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828479.png" alt="Logout" style="width: 16px; height: 16px; vertical-align: middle; margin-right: 5px;"> Logout
        </a>
    </div>
    <div class="container">
        <div class="side-bar">
            <ul>
                <li id="active"><a href="manage_posts.php" class="active-tab">Manage Posts</a></li>
                <li><a href="create_post.php">Create New Post</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="site_settings.php">Site Settings</a></li>
                <li><a href="analytics.php">View Analytics</a></li>
            </ul>
            <style>
                .active-tab {
                    font-weight: bold;
                    color: #fff;
                    background-color:rgba(91, 97, 104, 0.21);
                    padding: 10px;
                    border-radius: 4px;
                }
                .active-tab:hover {
                    background-color: #003366;
                }
            </style>
        </div>
        <div class="main-content">
            <h2>Welcome, Admin</h2>
            <div style="display: flex; align-items: center; margin-top: 10px;">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="User Icon" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                <p style="margin: 0;">Admin User</p>
            </div>
            <p>Use the options on the left to manage your blog.</p>
            <?php
            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'news_blog');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch posts from the database
            $sql = "SELECT id, title, date_posted FROM posts";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-top: 20px;">';
                echo '<tr style="background-color: #004080; color: #fff;">';
                echo '<th style="padding: 10px; text-align: left;">ID</th>';
                echo '<th style="padding: 10px; text-align: left;">Title</th>';
                echo '<th style="padding: 10px; text-align: left;">Dated</th>';
                echo '<th style="padding: 10px; text-align: left;">Actions</th>';
                echo '</tr>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr style="background-color: #f9f9f9;">';
                    echo '<td style="padding: 10px; border: 1px solid #ddd;">' . $row['id'] . '</td>';
                    echo '<td style="padding: 10px; border: 1px solid #ddd;">' . htmlspecialchars($row['title']) . '</td>';
                    echo '<td style="padding: 10px; border: 1px solid #ddd;">' . $row['date_posted'] . '</td>';
                    echo '<td style="padding: 10px; border: 1px solid #ddd;">';
                    echo '<a href="javascript:void(0);" onclick="openEditModal(' . $row['id'] . ', \'' . htmlspecialchars($row['title'], ENT_QUOTES) . '\')" style="margin-right: 10px; color: #004080; text-decoration: none;">';
                    echo '<img src="https://cdn-icons-png.flaticon.com/512/1159/1159633.png" alt="Edit" style="width: 16px; height: 16px; vertical-align: middle;"> Edit</a>';
                    echo '<a href="javascript:void(0);" onclick="openDeleteModal(' . $row['id'] . ')" style="color: red; text-decoration: none;">';
                    echo '<img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" alt="Delete" style="width: 16px; height: 16px; vertical-align: middle;"> Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>No posts found.</p>';
            }

            // Close connection
            $conn->close();
            ?>
        </div>
    </div>
    <style>
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #004080;
            color: #fff;
            padding: 10px 20px;
        }
        .top-bar h1 {
            margin: 0;
        }
        .top-bar .logout {
            background-color: red;
            color: #fff;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
        }
        .top-bar .logout:hover {
            background-color: darkred;
        }
        .container {
            display: flex;
            margin-top: 20px;
        }
        .side-bar {
            width: 200px;
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 8px;
        }
        .side-bar ul {
            list-style: none;
            padding: 0;
        }
        .side-bar ul li {
            margin-bottom: 10px;
        }
        .side-bar ul li a {
            text-decoration: none;
            color: #004080;
            padding: 10px;
            display: block;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .side-bar ul li a:hover {
            background-color: #e0e0e0;
        }
        .main-content {
            flex: 1;
            margin-left: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>










<!-- Delete Post Modal -->
<div id="deleteModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000;">
    <div style="background: #fff; padding: 20px; border-radius: 8px; width: 300px; margin: 100px auto; text-align: center;">
        <h3>Confirm Delete</h3>
        <p>Are you sure you want to delete this post?</p>
        <button id="confirmDelete" style="background-color: red; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Delete</button>
        <button id="cancelDelete" style="background-color: #ccc; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Cancel</button>
    </div>
</div>

<!-- Edit Post Modal -->
<div id="editModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1000;">
    <div style="background: #fff; padding: 20px; border-radius: 8px; width: 400px; margin: 100px auto;">
        <h3>Edit Post</h3>
        <form id="editForm" method="POST" action="">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'news_blog');

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            // Sanitize and update the post
            $id = intval($_POST['id']);
            $title = $conn->real_escape_string($_POST['title']);

            $sql = "UPDATE posts SET title = '$title' WHERE id = $id";

            if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Post updated successfully.');</script>";
            echo "<script>window.location.href='dashboard.php';</script>";
            } else {
            echo "<p style='color: red;'>Error updating post: " . $conn->error . "</p>";
            }

            // Close connection
            $conn->close();
        }
        ?>
            <input type="hidden" id="editPostId" name="id">
            <div style="margin-bottom: 10px;">
                <label for="editTitle">Title:</label>
                <input type="text" id="editTitle" name="title" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <button type="submit" style="background-color: #004080; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Save</button>
            <button type="button" id="cancelEdit" style="background-color: #ccc; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Cancel</button>
        </form>
    </div>
</div>









<script>
    // Delete Modal
    const deleteModal = document.getElementById('deleteModal');
    const confirmDelete = document.getElementById('confirmDelete');
    const cancelDelete = document.getElementById('cancelDelete');
    let deletePostId = null;

    function openDeleteModal(postId) {
        deletePostId = postId;
        deleteModal.style.display = 'block';
    }

    confirmDelete.addEventListener('click', () => {
        window.location.href = `delete_post.php?id=${deletePostId}`;
    });

    cancelDelete.addEventListener('click', () => {
        deleteModal.style.display = 'none';
    });

    // Edit Modal
    const editModal = document.getElementById('editModal');
    const cancelEdit = document.getElementById('cancelEdit');
    const editPostIdInput = document.getElementById('editPostId');
    const editTitleInput = document.getElementById('editTitle');

    function openEditModal(postId, postTitle) {
        editPostIdInput.value = postId;
        editTitleInput.value = postTitle;
        editModal.style.display = 'block';
    }

    cancelEdit.addEventListener('click', () => {
        editModal.style.display = 'none';
    });
</script>












</body>
</html>