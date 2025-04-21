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
            background-color: #ECF0F1; /* Soft light gray background */
            color: #2C3E50; /* Dark slate blue text */
        }
        .header {
            background-color: #2C3E50; /* Deep slate blue for header */
            color: #fff;
            padding: 20px;
            text-align: center;
            border-bottom: 3px solid #34495E;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .header img {
            width: 250px;
            height: 50px;
            margin: 10px auto;
            display: block;
        }
        .nav {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 80%;
            margin: 0 auto;
            padding: 10px 0;
            border-radius: 15px;
            background-color: #34495E;
            border-bottom: 2px solid #2C3E50;
        }
        .nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
        }
        .nav a:hover {
            color: #BDC3C7;
        }
        .cbanner {
            width: 100%;
            background-color: #2C3E50;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        .cbanner a {
            display: inline-block;
            margin: 3px;
            padding: 10px 15px;
            border: 1px solid #34495E;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            color: #fff;
            background-color: #5D6D7E;
        }
        .cbanner a:hover {
            background-color: #BDC3C7;
            color: #2C3E50;
        }
        .headline-banner {
            width: 100%;
            overflow: hidden;
            background-color: #34495E;
            color: #fff;
            padding: 10px 0;
            font-weight: bold;
            text-align: center;
        }
        .headline-banner p {
            display: inline-block;
            animation: scroll 25s linear infinite;
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
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .post {
            background-color: #fff;
            border: 1px solid #BDC3C7;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            overflow: hidden; /* Ensure content wraps properly around the floated image */
        }
        .post img {
            width: 400px; /* Set the width to 400px */
            height: auto; /* Maintain aspect ratio */
            object-fit: cover;
            border-radius: 5px;
            margin: 0 15px 15px 0; /* Add margin to create spacing around the image */
            float: left; /* Make the image float to the left */
        }
        .post h2 {
            margin: 0 0 10px;
            font-size: 18px;
            color: #2C3E50;
        }
        .post p {
            margin: 0 0 10px;
            font-size: 14px;
            color: #2C3E50;
            text-align: justify;
        }
        .post .meta {
            font-size: 12px;
            color: #7F8C8D;
            clear: both; /* Ensure meta information is displayed below the floated content */
        }
        .post .meta a {
            color: #004080;
            text-decoration: none;
            margin-right: 10px;
        }
        .post .meta a:hover {
            text-decoration: underline;
        }
        .footer {
            background-color: #2C3E50;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        .footer a {
            color: #BDC3C7;
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
        <img src="imgs/logo1.png" alt="Logo">
    </div>
    <div class="nav">
        <a href="#">HOME</a>
        <a href="#">ABOUT</a>
        <a href="#">CONTACT US</a>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <a href="admin/index.php" style="margin-left: auto;">
            <i class="fas fa-user" style="color: green; font-size: 16px; background-color: white; border-radius: 50%; padding: 5px;"></i> LOGIN
        </a>
    </div>
    <div class="cbanner categories">
        <a href="#">NEWS</a>
        <a href="#">ENTERTAINMENT</a>
        <a href="#">LIFESTYLE</a>
        <a href="#">SPORTS</a>
        <a href="#">POLITICS</a>
        <a href="#">TECHNOLOGY</a>
        <a href="#">EDITOR'S NOTE</a>
    </div>
    <div class="headline-banner">
        <?php
        $conn = new mysqli('localhost', 'root', '', 'news_blog');
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
    <div class="content">
        <?php
        $sql = "SELECT * FROM posts ORDER BY date_posted DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="post">
                    <h2><?php echo $row['title']; ?></h2>
                    <img src="<?php echo $row['image_url']; ?>" alt="">
                    <p><?php echo $row['content']; ?></p>
                    <div class="meta">
                        <a href="#">Read More</a>
                        <span><?php echo date('F d, Y', strtotime($row['date_posted'])); ?></span>
                        <span style="margin-left: 10px;">Written by: <?php echo $row['author']; ?></span>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No posts available.</p>
            <a href="admin/index.php">Write a post</a>
        <?php endif; ?>
    </div>
    <?php $conn->close(); ?>
    <div class="footer">
        <p>&copy; <?php echo date('Y'); ?> News & Views. All Rights Reserved. <a href="#">Privacy Policy</a></p>
    </div>
</body>
</html>
