<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define the admin username and password (you should use a more secure method for storing credentials)
    $admin_username = "admin";
    $admin_password = "admin123";

    // Get the submitted username and password
    $submitted_username = $_POST["username"];
    $submitted_password = $_POST["password"];

    // Check if the submitted username and password match the admin's credentials
    if ($submitted_username == $admin_username && $submitted_password == $admin_password) {
        // Authentication successful
        echo "Login successful! Welcome, Admin!";
        header("Location: ../adminDashboard.php");
        exit; // Terminate the script to prevent further execution
    } else {
        // Authentication failed
        echo '<script>alert("Invalid username or password. Please try again.");</script>';
        echo '<script>window.location = "../index.php";</script>';
        exit; // Terminate the script to prevent further execution
    }
}
?>
