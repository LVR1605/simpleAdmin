<?php

require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

include "deleteUser.php";
        

$sql = "SELECT * FROM users WHERE deleted_at IS null";
$result = $conn->query($sql);

$conn->close();

if (isset($_POST['user_id'])) {
    $search_user_id = $_POST['user_id'];
    $found = false; // Track if a match is found

    while ($row = $result->fetch_assoc()) {
        $user_id = $row['user_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $pass = $row['pass'];

        if ($user_id == $search_user_id) {
            echo "<tr class='highlight'>";
            $found = true; // Match found
        } else {
            echo "<tr>";
        }

        echo "<td>$user_id</td>";
        echo "<td>$first_name $last_name</td>";
        echo "<td>$email</td>";
        echo "<td>$pass</td>";
        echo "<td><a href='deleteUser.php?user_id=" . $row['user_id'] . "'>Delete</a></td>"; // Add a delete link
        echo "</tr>";
    }

    if ($found) {
        echo '<script type="text/javascript">
            document.querySelector(".highlight").scrollIntoView({ behavior: "smooth" });
        </script>';
    }
} else {
    // Display all users initially
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['user_id']}</td>";
        echo "<td>{$row['first_name']} {$row['last_name']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['pass']}</td>";
        echo "<td><form method='post'><input type='hidden' name='delete_user_id' value='{$row['user_id']}'><button type='submit' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</button></form></td>";
        echo "</tr>";
    }
}
?>
