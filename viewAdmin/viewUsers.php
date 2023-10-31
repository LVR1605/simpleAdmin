<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .highlight {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <button><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></button>
    <button><a href="../adminDashboard.php">Home</a></button>
    <h3 class="font-size">Users</h3>
    <p>
        <?php
        if (isset($_GET['save-success'])) {
            echo "Successfully saved";
        }
        ?>
    </p>

    <div>
        <form method="post">
            <label for="search">Search by User ID: </label>
            <input type="text" id="search" name="user_id" placeholder="Enter User ID">
            <input type="submit" value="Search">
        </form>
    </div>

    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Pin</th>
        </thead>
        <tbody>
            <?php
            require('../controller/users.php');

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
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
        <script>
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
                    }
                });
            }
        </script>
</body>
</html>
