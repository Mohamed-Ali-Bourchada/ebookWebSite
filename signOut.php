<?php
session_start();
unset($_SESSION['auth']); 
unset($_SESSION['admin']);
unset($_SESSION["user_email"]);
unset($_SESSION["alert_shown"]);
session_destroy();
header("Location: login/login.php");
?>
