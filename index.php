<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWS & VIEWS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9; /* Light neutral background */
            color: #333; /* Dark text for readability */
        }
        .header {
            background-color: #004080; /* Deep blue for a professional look */
            color: #fff; /* White text for contrast */
            padding: 20px;
            text-align: center;
            border-bottom: 3px solid #ffcc00; /* Accent color for emphasis */
        }
        .header img {
            max-width: 100px;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
        }
        .nav {
            display: flex;
            justify-content: center;
            padding: 10px 0;
            background-color: #003366; /* Slightly darker blue for navigation */
            border-bottom: 2px solid #ffcc00;
        }
        .nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #fff; /* White text for contrast */
            font-size: 16px;
            font-weight: bold;
        }
        .nav a:hover {
            color: #ffcc00; /* Highlight on hover */
        }
        .headline-banner {
            width: 100%;
            overflow: hidden;
            background-color: #ffcc00; /* Bright yellow for attention */
            color: #333; /* Dark text for readability */
            position: relative;
            white-space: nowrap;
            padding: 10px 0;
            font-weight: bold;
        }
        .headline-banner p {
            display: inline-block;
            animation: scroll 10s linear infinite;
        }
        .cbanner {
            width: 100%;
            overflow: hidden;
            background-color: #004080; /* Deep blue for consistency */
            color: #fff;
            position: relative;
            white-space: nowrap;
            text-align: center;
            padding: 10px 0;
        }
        .cbanner a {
            display: inline-block;
            margin: 3px;
            padding: 10px 15px;
            border: 1px solid #ffcc00; /* Accent border */
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            color: #fff;
            background-color: #003366; /* Slightly darker blue for buttons */
        }
        .cbanner a:hover {
            background-color: #ffcc00; /* Highlight on hover */
            color: #333;
        }
        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .post {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: flex;
            align-items: flex-start;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }
        .post img {
            max-width: 200px;
            margin-right: 20px;
            border-radius: 5px;
        }
        .post .text {
            flex: 1;
        }
        .post h2 {
            margin-top: 0;
            color: #004080; /* Deep blue for headings */
        }
        .post p {
            color: #666; /* Subtle gray for body text */
        }
        .post .meta {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 14px;
            color: #999;
        }
        .post .meta a {
            color: #004080; /* Link color */
            text-decoration: none;
        }
        .post .meta a:hover {
            text-decoration: underline;
        }
        .footer {
            background-color: #003366; /* Dark blue for footer */
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .footer a {
            color: #ffcc00; /* Accent color for links */
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                align-items: center;
            }
            .nav a {
                margin: 5px 0;
            }
            .cbanner a {
                display: block;
                margin: 5px auto;
                width: 90%;
                text-align: center;
            }
            .post {
                flex-direction: column;
                align-items: center;
            }
            .post img {
                max-width: 100%;
                margin: 0 0 15px 0;
            }
            .post .text {
                text-align: center;
            }
            .headline-banner p {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 20px;
            }
            .nav a {
                font-size: 14px;
            }
            .cbanner a {
                font-size: 14px;
            }
            .post h2 {
                font-size: 18px;
            }
            .post p {
                font-size: 14px;
            }
            .footer {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
       <div class="logo" style="background-color: #f9f9f9; width: 100%; height: 50px; display: flex; justify-content: center; align-items: center;">
        <img src="logo.png" alt="N360 Logo" style="width: auto; height: 40px; background-color: #f5f5f5; border-radius: 30px;box-shadow: #111111 1px 1px 1px; margin: 10px;"> 
           <h1 style="margin: 0; color: #004080;">NEWS & VIEWS</h1>
           
       </div>
        <!-- <h1>NEWS & VIEWS</h1> -->
    </div>
    <div class="nav">
        <a href="#">HOME</a>
        <a href="#">ABOUT</a>
        <a href="#">CONTACT US </a>
        
    </div>
    <div class="cbanner categories">
        <a href="">NEWS</a>
        <a href="">ENTERTAINMENT</a>
        <a href="">LIFESTYLE</a>
        <a href="">SPORTS</a>
        <a href="">POLITICS</a>
        <a href="">TECHNOLOGY</a>
        <a href="">EDITOR`S NOTE</a>
    </div>
    <div class="headline-banner">
        <?php
        // Fetch headlines from the database
        $host = 'localhost';
$username = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password
$dbname = 'news_blog';

$conn = new mysqli($host, $username, $password, $dbname);
        $headline_sql = "SELECT title FROM posts ORDER BY date_posted DESC LIMIT 5";
        $headline_result = $conn->query($headline_sql);

        if ($headline_result->num_rows > 0): ?>
            <p><strong>TOP STORIES:</strong>
                <?php while ($headline_row = $headline_result->fetch_assoc()): ?>
                    <?php echo $headline_row['title']; ?><span> | </span>
                <?php endwhile; ?>
            </p>
        <?php else: ?>
            <p><strong>TOP STORIES:</strong> No headlines available.</p>
        <?php endif; ?>
    </div>





    <?php
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

// Fetch posts
$sql = "SELECT * FROM posts ORDER BY date_posted DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWS & VIEWS</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="content_wrapper" style="margin-top: 20px; display: flex; justify-content: center; align-items: center;">
    <div class="content">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="post">
                    <img src="<?php echo $row['image_url']; ?>" alt="Post Image">
                    <div class="text">
                        <h2><?php echo $row['title']; ?></h2>
                        <p><?php echo $row['content']; ?></p>
                        <div class="meta">
                            <a href="#">Read More</a>
                            <span><?php echo date('F d, Y', strtotime($row['date_posted'])); ?></span> <br>
                            <span>Written by: <?php echo $row['author']; ?></span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No posts available.</p>
        <?php endif; ?>
    </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
    <div class="footer">
        <p>Copyright © All rights reserved. <a href="newsviews.co.zw"> News&Views.co.zw</a></p>
        <h3> Written by Amen Anesu. </h3>
    </div>
</body>
</html>
