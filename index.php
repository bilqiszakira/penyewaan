<?php
session_start();
header("Location: ".(isset($_SESSION['login']) ? "dashboard.php" : "login.php"));
exit;
?>