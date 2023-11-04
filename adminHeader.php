<?php
   include_once "config/dbconnect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Other head elements -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href=".assets/css/style.css">
</head>
<body>
 <!-- nav -->
 <nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">
    <a class="navbar-brand ml-5" href="index.php">
        <a href="adminDashboard.php"><img src="../assets/images/logo.png" width="80" height="80" alt="Admin"></a>
    </a>
    <ul class="navbar-nav ml-auto">
        <li>
            <div>
                <h4 style="color:white;"><a href="../viewAdmin/createAdmin.php">Add Admin</a></h4>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#" onclick="confirmLogout()">
                <i class="fas fa-sign-out-alt text-white"></i> Logout
            </a>
        </li>
    </ul>
</nav>

<script>
function confirmLogout() {
    var result = confirm("Are you sure you want to log out?");
    if (result) {
        // Redirect to the logout page or perform your logout action here
        window.location.href = "./controller/adminLogout.php";
    } else {
        // Do nothing if the user clicks Cancel
    }
}
</script>

</body>
</html>
