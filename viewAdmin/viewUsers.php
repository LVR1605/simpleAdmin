<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <button><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></button>
    <button><a href="../adminDashboard.php">Home</a></button>
    <h3 class="font-size">Users</h3>
    <div>
        <form method="get" action="viewUsers.php">
            <label for="search">Search by User ID: </label>
            <input type="text" id="search" name="user_id" placeholder="Enter User ID">
            <input type="submit" value="Search">
        </form>
    </div>
    <div>
        <table>
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Pin</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                include "../controller/users.php";
                ?>
            </tbody>
        </table>
    </div>
    <button id="goBackButton">Go Back Up</button>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    // JavaScript to scroll back to the top of the page when the button is clicked
    const goBackButton = document.getElementById("goBackButton");

    goBackButton.addEventListener("click", () => {
        window.scrollTo({
        top: 0,
        behavior: "smooth"
        });
    });
    });

    // JavaScript to highlight the row based on user_id query parameter
    const urlParams = new URLSearchParams(window.location.search);
    const user_id = urlParams.get('user_id');
    if (user_id) {
    const table = document.querySelector('table');
    const rows = table.querySelectorAll('tr');
    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        if (cells.length > 0 && cells[0].textContent === user_id) {
        row.style.backgroundColor = 'yellow'; // Change the background color as desired
        row.scrollIntoView({ behavior: "smooth" }); // Scroll to the highlighted row
        }
    });
    }; 
</script>
</html>
