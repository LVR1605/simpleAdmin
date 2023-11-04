<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Results</title>
</head>
<body>
    <div class="button-container">
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><button>Back</button></a>
    <a href="../viewAdmin/adminDashboard.php"><button>Home</button></a>
    </div>
    <h1>Diagnosis Count</h1>
    <table>
        <?php
        include "../controller/chart.php";
        ?>
    </table>
</body>
</html>