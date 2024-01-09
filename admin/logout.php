<?php
session_start();
    if (isset($_GET['logout'])) {
        // Unset all session variables
        $_SESSION = array();
        
        // Destroy the session
        session_destroy();
        
        // Redirect to login page or any other page after logout
        header("Location: login.php"); // Change 'login.php' to your login page URL
        exit();
    }
?>