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

    // Check if the file is an actual image, if a file is uploaded
    if (isset($_FILES["image_file"]) && $_FILES["image_file"]["tmp_name"] != "") {
        $check = getimagesize($_FILES["image_file"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<script>alert('File is not an image.');</script>";
            $uploadOk = 0;
        }
    } else {
        // No file uploaded, proceed without an image
        $uploadOk = 1;
        $targetFilePath = null; // Set image path to null
    }

    // Check file size (limit to 9MB)
    if ($_FILES["image_file"]["size"] > 9000000) {
        echo "<script>alert('Sorry, your file is too large.');</script>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (!empty($imageFileName) && !in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.');</script>";
    } else {
        // If no file is uploaded, set $targetFilePath to NULL
        if (empty($imageFileName)) {
            $targetFilePath = null;
        } else {
            // Try to upload the file
            if (!move_uploaded_file($_FILES["image_file"]["tmp_name"], $targetFilePath)) {
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
                $targetFilePath = null; // Proceed without an image
            }
        }

        // Insert the post into the database
        $sql = "INSERT INTO posts (title, content, image_url, date_posted, author) 
                VALUES ('$title', '$content', " . ($targetFilePath ? "'" . substr($targetFilePath, 3) . "'" : "NULL") . ", '$date_posted', '$author')";

        if ($conn->query($sql) === TRUE) {
            // Show a success alert and redirect back to the dashboard
            echo "<script>alert('Post created successfully!'); window.location.href = 'dashboard.php';</script>";
        } else {
            // Show an error message
            echo "<script>alert('Error creating post: " . $conn->error . "');</script>";
        }
    }

    // Close the database connection
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
            margin: 0;
            padding: 20px;
        }
        .form-container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h1 {
            color: #004080;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        .form-container input, .form-container textarea, .form-container button {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-container textarea {
            resize: vertical;
            min-height: 120px;
        }
        .form-container button {
            background-color: #004080;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
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
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }
        .form-container .actions a:hover {
            background-color: #bbb;
        }
        .form-container img {
            display: block;
            margin: 0 auto 20px;
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Create New Post</h1>
        <img src="logo1.png" alt="Logo" style="width: 200px; height: 50px; margin-bottom: 20px;">

  <a href="dashboard.php" style="display: inline-flex; align-items: center; text-decoration: none; background-color: #004080; color: #fff; padding: 10px 15px; border-radius: 5px; font-size: 16px; text-align: center; margin: 4px"> Go Back</a>    
  <hr> <br> 
        <form method="POST" action="" enctype="multipart/form-data">
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

    <footer style="text-align: center; margin-top: 20px; padding: 10px; background-color:rgba(55, 57, 59, 0.29); color: #fff; border-radius: 8px;">
        <p>&copy; <?php echo date('Y'); ?> News Blog Admin Panel. All Rights Reserved.</p>
    </footer>
</body>
</html>