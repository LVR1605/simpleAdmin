<?php
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    
    include "../config/db.php"; // Include your database connection code
    
    // First, delete user's data from the result table
    $deleteResultQuery = "DELETE FROM result WHERE user_id = $user_id";
    if (mysqli_query($conn, $deleteResultQuery)) {
        // Now, delete the user from the users table
        $deleteUserQuery = "DELETE FROM users WHERE user_id = $user_id";
        if (mysqli_query($conn, $deleteUserQuery)) {
            // User and related data deleted successfully
            header("Location: viewUsers.php");
        } else {
            // Handle user table deletion error
            echo "Error deleting user: " . mysqli_error($conn);
        }
    } else {
        // Handle result table deletion error
        echo "Error deleting user's data from the result table: " . mysqli_error($conn);
    }
} else {
    // Handle missing user_id parameter
    echo "Invalid request.";
}
?>
