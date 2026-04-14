<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
echo "Starting logout...<br>"; // Temporary debug output

session_unset();
session_destroy();
echo "Session destroyed. Redirecting...<br>"; // Temporary debug output

header("location: login.php");
exit();
?>