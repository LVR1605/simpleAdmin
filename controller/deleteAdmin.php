<?php

require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

// Check if admin_id is set in the URL
if (isset($_GET["admin_id"])) {
    $admin_id = $_GET["admin_id"];

    // Prepare and bind a DELETE statement
    $stmt = $conn->prepare("DELETE FROM admins WHERE admin_id = ?");
    $stmt->bind_param("i", $admin_id); // Assuming admin_id is an integer

    // Execute the DELETE query
    if ($stmt->execute()) {
        // Record deleted successfully
        $stmt->close();
        $conn->close();
        header("location: ../viewAdmin/viewAdmin.php?save-success=true");
    } else {
        // Handle the case where the deletion failed
        echo "Error: " . $stmt->error;
    }
} else {
    // Handle the case where admin_id is not set in the URL
    echo "Invalid admin_id parameter";
}
