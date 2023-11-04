<?php
session_start();

// Check if an admin is logged in
if (!isset($_SESSION['admin_id'])) {
    // Redirect to the login page if no admin is logged in
    header("Location: .adminLogin.php");
    exit;
}

// Fetch the logged-in admin's details from the database
require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

$admin_id = $_SESSION['admin_id'];
$stmt = $conn->prepare("SELECT admin_first_name FROM admins WHERE admin_id = ?");
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$stmt->bind_result($admin_first_name);
$stmt->fetch();
$stmt->close();
?>
