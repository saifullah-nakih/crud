<?php
session_start();

// Check if the user is already logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page or any other page as needed
    header("Location: login.php");
    exit();
}


$_SESSION = array();

session_destroy();

header("Location: index.php");
exit();
