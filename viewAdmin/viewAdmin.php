<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Admins</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<button><a href="../adminDashboard.php">Back</a></button>
        <h3 class="font-size" >Admins</h3>
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
                <th>Password</th>
            </thead>
            <tbody>
                <?php
                require('../controller/admins.php');
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['admin_id']; ?></td>
                        <td>
                            <?php echo $row['admin_first_name']; ?> 
                            <?php echo $row['admin_last_name']; ?>
                        </td>
                        <td><?php echo $row['admin_email']; ?></td> 
                        <td><?php echo $row['admin_pass']; ?></td> 
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>