<?php
require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

if (isset($_POST['delete_user_id'])) {
    $user_id_to_delete = $_POST['delete_user_id'];
    
    // Delete the user from the users table
    $delete_sql = "DELETE FROM users WHERE user_id = $user_id_to_delete";
    if ($conn->query($delete_sql) === TRUE) {
        // Delete the matching user_id in the results table
        $delete_results_sql = "DELETE FROM results WHERE user_id = $user_id_to_delete";
        $conn->query($delete_results_sql);
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}
?>
