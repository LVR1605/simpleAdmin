<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <div class="centered-form">
        <h2>Admin Login</h2>
        <form action="./controller/adminLogin.php" method="post">
            <label for="username">Username:</label>
            <input type="email" name="username" id="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br><br>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
