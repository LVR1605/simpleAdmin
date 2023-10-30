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
            <input type="text" name="username" id="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br><br>

            <input type="submit" value="Login">
        </form>
    </div>

    <style>
        /* Center the form horizontally and vertically */
        .centered-form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Style for the login form */
        h2 {
            margin: 20px;
            background-color: black;
            padding: 10px;
            border-radius: 5px;
            color: white;
        }

        form {
            text-align: left;
            padding: 4%;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            margin: 3%;
            padding: 5%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: white;
            transition-duration: .5s;
            color: black;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }
    </style>
</body>
</html>
