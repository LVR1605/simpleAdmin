<?php
session_start();
// Check if an admin is logged in
if (!isset($_SESSION['admin_id'])) {
    // Redirect to the login page if no admin is logged in
    header("Location: adminLogin.php");
    exit;
}
include_once "../config/dbconnect.php";
// Display the name of the logged-in admin
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $stmt = $conn->prepare("SELECT admin_first_name FROM admins WHERE admin_id = ?");
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $stmt->bind_result($admin_first_name);
    $stmt->fetch();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Admins</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script>
        function confirmDelete(admin_id) {
            if (confirm("Are you sure you want to delete this admin?")) {
                window.location = "../controller/deleteAdmin.php?admin_id=" + admin_id;
            }
        }
    </script>
</head>
<body>
<button><a href="../adminDashboard.php">Back</a></button>
<p>Admin in use, <?php echo $admin_first_name; ?></p>
<p>
    <?php
    if (isset($_GET['save-success'])) {
        echo "Successfully saved";
    }
    ?>
</p>
</div>
<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
    </thead>
    <tbody>
        <?php
        require('../controller/admins.php');
        while ($row = $result->fetch_assoc()) {
            // Check if the logged-in admin's first name is "admin"
            // If it is, they can delete other admins (excluding themselves)
            if ($admin_first_name === "admin" && $row['admin_first_name'] !== "admin") {
                $deleteLink = '<a href="javascript:void(0);" onclick="confirmDelete(' . $row['admin_id'] . ')">Delete</a>';
            } else {
                // Admin with other names or "admin" itself can't delete
                $deleteLink = 'N/A';
            }
        ?>
            <tr>
                <td><?php echo $row['admin_id']; ?></td>
                <td>
                    <?php echo $row['admin_first_name']; ?>
                    <?php echo $row['admin_last_name']; ?>
                </td>
                <td><?php echo $row['admin_email']; ?></td>
                <td><?php echo $row['admin_pass']; ?></td>
                <td><?php echo $deleteLink; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>
