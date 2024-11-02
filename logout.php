<?php
// Start the session
session_start();

// Destroy the session
session_destroy();

// Unset session variables
unset( $_SESSION["fname"]);
unset($_SESSION["role"]);
unset($_SESSION["userid"]);

// Redirect the user to the login page
header('Location: login.php');
?>