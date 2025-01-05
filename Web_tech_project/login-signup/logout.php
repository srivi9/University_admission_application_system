<?php
// starting our sessions
session_start();

// Unset all session variables in the system
$_SESSION = array();

// Destroy the sessions
session_destroy();

// then Redirect to the login page
header("Location: login-page.html");
exit; 
?>
