<!-- filepath: c:\Users\User\Desktop\amen\admin\logout.php -->
<?php
session_start();
session_destroy();
header('Location: index.php'); // Redirect to login page
exit();
?>