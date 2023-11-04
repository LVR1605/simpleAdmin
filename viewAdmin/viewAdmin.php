
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Admins</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php
include "../controller/adminIncharge.php";
?>
<button><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></button>
<button><a href="../viewAdmin/adminDashboard.php">Home</a></button>
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
        <th>Action</th>
        
    </thead>
    <tbody>
        <?php
        include "../controller/admins.php";
        ?>
        
    </tbody>
</table>
</body>
    <script>
        function confirmDelete(admin_id) {
            if (confirm("Are you sure you want to delete this admin?")) {
                window.location = "../controller/deleteAdmin.php?admin_id=" + admin_id;
            }
        }
    </script>
</html>
