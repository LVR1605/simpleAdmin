<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<button><a href="../adminDashboard.php">Back</a></button>
        <h3 class="font-size" >Users</h3>
        <p>
            <?php
            if (isset($_GET['save-success'])) {
                echo "Successfully saved";
                }
            ?>
        </p> 
    </div > 
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
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['user_id']; ?></td>
                        <td>
                            <?php echo $row['first_name']; ?> 
                            <?php echo $row['last_name']; ?>
                        </td>
                        <td><?php echo $row['email']; ?></td> 
                        <td><?php echo $row['pass']; ?></td> 
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>