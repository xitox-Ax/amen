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
            color: #fff; /* White text for contrast */
            padding: 20px;
            text-align: center;
            border-bottom: 3px solid #34495E; /* Steel blue accent */
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
            background-color: #34495E; /* Steel blue for navigation */
            border-bottom: 2px solid #2C3E50; /* Deep slate blue accent */
        }
        .nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #fff; /* White text for contrast */
            font-size: 16px;
            font-weight: bold;
        }
        .nav a:hover {
            color: #BDC3C7; /* Light gray for hover effect */
        }
        .headline-banner {
            width: 100%;
            overflow: hidden;
            background-color: #34495E; /* Steel blue for attention */
            color: #fff; /* White text */
            position: relative;
            white-space: nowrap;
            padding: 10px 0;
            font-weight: bold;
            text-align: center;
        }
        .headline-banner p {
            display: inline-block;
            animation: scroll 25s linear infinite;
        }
        .cbanner {
            width: 100%;
            overflow: hidden;
            background-color: #2C3E50; /* Deep slate blue for consistency */
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
            border: 1px solid #34495E; /* Accent border */
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            color: #fff;
            background-color: #5D6D7E; /* Muted blue-gray for buttons */
        }
        .cbanner a:hover {
            background-color: #BDC3C7; /* Light gray for hover */
            color: #2C3E50;
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
            text-align: left;
        }
        .post {
            background-color: #fff; /* White background for posts */
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            border: 1px solid #BDC3C7; /* Light gray border */
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
            color: #2C3E50; /* Deep slate blue for headings */
        }
        .post p {
            color: #2C3E50; /* Dark slate blue for body text */
        }
        .post .meta {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 14px;
            color: #7F8C8D; /* Subtle gray for meta text */
        }
        .post .meta a {
            color: #5D6D7E; /* Muted blue-gray for links */
            text-decoration: none;
        }
        .post .meta a:hover {
            text-decoration: underline;
        }
        .footer {
            background-color: #2C3E50; /* Deep slate blue for footer */
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        .footer a {
            color: #BDC3C7; /* Light gray for links */
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
        <h1>NEWS & VIEWS</h1>
    </div>
    <div class="nav" style="width: 80%; align-items: center; margin: 0 auto; padding: 10px 0;border-radius: 15px; background-color: #34495E; border-bottom: 2px solid #2C3E50;">
        <a href="#">HOME</a>
        <a href="#">ABOUT</a>
        <a href="#">CONTACT US</a>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
       
        <div style="margin-left: auto;" >
       
            <a href="admin/index.php"> <i class="fas fa-user" style="color: green; font-size: 16px; background-color: white; border-radius: 50%; padding: 5px;"></i>LOGIN</i></a>
        </div>

        </a>
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
       <div class="content" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 4fr)); gap: 20px; padding: 20px;">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="post" style="display: flex; align-items: flex-start; background-color: #fff; border: 1px solid #BDC3C7; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 15px; gap: 15px;">
                    <img src="<?php echo $row['image_url']; ?>" alt="" style="width: 120px; height: 120px; object-fit: cover; border-radius: 5px;">
                    <div class="text" style="flex: 1;">
                        <h2 style="margin: 0 0 10px; font-size: 18px; color: #2C3E50;"><?php echo $row['title']; ?></h2>
                        <p style="margin: 0 0 10px; font-size: 14px; color: #2C3E50; text-align:left"><?php echo $row['content']; ?></p>
                        <div class="meta" style="font-size: 12px; color: #7F8C8D;">
                            <a href="#" style="color: #004080; text-decoration: none; margin-right: 10px;">Read More</a>
                            <span><?php echo date('F d, Y', strtotime($row['date_posted'])); ?></span>
                            <span style="margin-left: 10px;">Written by: <?php echo $row['author']; ?></span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No posts available.</p> 
            <a href="admin/index.php">Write a post</a>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
    <div class="footer">
        <p>&copy; <?php echo date('Y'); ?> News & Views. All Rights Reserved. <a href="#">Privacy Policy</a></p>
    </div>
</body>
</html>
