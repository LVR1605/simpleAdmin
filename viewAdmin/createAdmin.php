<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>New User</title>
    <link rel="stylesheet" href="../css/style.css">
    <title>New Admin</title>
</head>

<body>
    <a href="../controller/saveAdmin.php">Back</a>
    <h3>Add Admin</h3>
    
    <form action="../controller/saveAdmin.php" method="POST">
    <div>
        <label>First Name</label><br />
        <input type="text" name="admin_first_name" placeholder="First Name" />
    </div>
    <div>
        <label>Last Name</label><br />
        <input type="text" name="admin_last_name" placeholder="Last Name" />
    </div>
    <div>
        <label>Email</label><br />
        <input type="email" name="admin_email" placeholder="Email" />
    </div>
    <div>
        <label>Password</label><br />
        <input type="password" name="admin_pass" placeholder="Password" />
    </div>
    <div>
        <button type="submit">Save</button>
    </div>
</form>
</body>
</html>