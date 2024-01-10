<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page (change the URL accordingly)
header("Location: index.html");
exit;
?>