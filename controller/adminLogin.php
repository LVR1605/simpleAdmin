<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

    // Get the submitted username and password
    $submitted_username = $_POST["username"];
    $submitted_password = $_POST["password"];

    // Prepare and execute a query to fetch the admin's credentials from the database
    $stmt = $conn->prepare("SELECT admin_email, admin_pass FROM admins WHERE admin_email = ?");
    $stmt->bind_param("s", $submitted_username);
    $stmt->execute();
    $stmt->bind_result($admin_email, $admin_password);
    $stmt->fetch();
    $stmt->close();

    // Check if the submitted username and password match the admin's credentials from the database
    if ($submitted_username == $admin_email && password_verify($submitted_password, $admin_password)) {
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
