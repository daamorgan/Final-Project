<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
session_destroy();
header("Location: Loginpage.php");
exit;
?>

