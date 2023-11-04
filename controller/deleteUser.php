<?php
require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Delete the user from the users table
    $deleteUserSQL = "DELETE FROM users WHERE user_id = $user_id";
    if ($conn->query($deleteUserSQL) === true) {
        // Delete related results from the results table
        $deleteResultsSQL = "DELETE FROM result WHERE user_id = $user_id";
        if ($conn->query($deleteResultsSQL) === true) {
            // Success: User and related results deleted
            header("Location: ../viewAdmin/viewUsers.php"); // Redirect back to the main page
        } else {
            echo "Error deleting related results: " . $conn->error;
        }
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

$conn->close();
?>
