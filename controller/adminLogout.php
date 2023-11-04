<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
}

// Redirect the user to the login page (index.php)
header("Location: ../index.php");
exit;
?>
