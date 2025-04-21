<?php
// Start session
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin'])) {
    header('Location: index.php'); // Redirect to login if not logged in
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'news_blog');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and retrieve form data
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $author = $conn->real_escape_string($_POST['author']);
    $date_posted = date('Y-m-d'); // Use the current date

    // Handle file upload
    $targetDir = "../imgs/";
    $imageFileName = basename($_FILES["image_file"]["name"]);
    $targetFilePath = $targetDir . $imageFileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    if (isset($_FILES["image_file"]) && $_FILES["image_file"]["tmp_name"] != "") {
        $check = getimagesize($_FILES["image_file"]["tmp_name"]);
        if ($check === false) {
            echo "<script>alert('File is not an image.');</script>";
            $uploadOk = 0;
        }
    } else {
        $targetFilePath = null; // No file uploaded
    }

    if ($_FILES["image_file"]["size"] > 9000000) {
        echo "<script>alert('File is too large.');</script>";
        $uploadOk = 0;
    }

    if (!empty($imageFileName) && !in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
        echo "<script>alert('Only JPG, JPEG, PNG & GIF files are allowed.');</script>";
        $uploadOk = 0;
    }

    if ($uploadOk && !empty($imageFileName)) {
        if (!move_uploaded_file($_FILES["image_file"]["tmp_name"], $targetFilePath)) {
            echo "<script>alert('Error uploading file.');</script>";
            $targetFilePath = null;
        }
    }

    $sql = "INSERT INTO posts (title, content, image_url, date_posted, author) 
            VALUES ('$title', '$content', " . ($targetFilePath ? "'" . substr($targetFilePath, 3) . "'" : "NULL") . ", '$date_posted', '$author')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Post created successfully!'); window.location.href = 'dashboard.php';</script>";
    } else {
        echo "<script>alert('Error creating post: " . $conn->error . "');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        .form-container {
            max-width: 600px; /* Reduced width */
            margin: 0 auto;
            background-color: #fff;
            padding: 20px; /* Reduced padding */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h1 {
            color: #004080;
            text-align: center;
            margin-bottom: 15px; /* Reduced margin */
            font-size: 20px; /* Reduced font size */
        }
        .form-container label {
            display: block;
            margin-bottom: 6px; /* Reduced margin */
            font-weight: bold;
            color: #333;
            font-size: 14px; /* Reduced font size */
        }
        .form-container input, .form-container textarea, .form-container button {
            width: 100%;
            padding: 10px; /* Reduced padding */
            margin-bottom: 15px; /* Reduced margin */
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px; /* Reduced font size */
        }
        .form-container textarea {
            resize: vertical;
            min-height: 100px; /* Reduced height */
        }
        .form-container button {
            background-color: #004080;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 14px; /* Reduced font size */
        }
        .form-container button:hover {
            background-color: #003366;
        }
        .form-container .actions {
            display: flex;
            justify-content: space-between;
        }
        .form-container .actions a {
            text-decoration: none;
            background-color: #ccc;
            color: #333;
            padding: 8px 12px; /* Reduced padding */
            border-radius: 5px;
            font-size: 14px; /* Reduced font size */
        }
        .form-container .actions a:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <img src="logo1.png" alt="" style="width:200px; height:50px; margin-bottom: 20px;">
        <h1>Create New Post</h1> 
        <a href="dashboard.php" style="text-decoration: none; background-color: #004080; color: #fff; padding: 8px 12px; border-radius: 5px; font-size: 14px;">Go Back</a>
        <br>
        <form method="POST" action="" enctype="multipart/form-data">
        <br><hr>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Enter the post title" required>

            <label for="content">Content:</label>
            <textarea id="content" name="content" placeholder="Write your post content here..." required></textarea>
            <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('content');
            </script>

            <label for="image_file">Upload Image (optional):</label>
            <input type="file" id="image_file" name="image_file" accept="image/*">

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" placeholder="Enter the author's name" required>

            <div class="actions">
                <button type="submit">Create Post</button>
            </div>
        </form>
    </div>

    <footer style="text-align: center; margin-top: 15px; padding: 8px; background-color: rgba(55, 57, 59, 0.29); color: #fff; border-radius: 8px; font-size: 12px;">
        <p>&copy; <?php echo date('Y'); ?> News Blog Admin Panel. All Rights Reserved.</p>
    </footer>
</body>
</html>