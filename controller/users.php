<?php

require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT u.user_id, u.first_name, u.last_name, u.email, u.pass, u.created_at, GROUP_CONCAT(r.result) AS results
        FROM users u
        LEFT JOIN result r ON r.user_id = u.user_id
        WHERE u.deleted_at IS NULL
        GROUP BY u.user_id, u.first_name, u.last_name, u.email, u.pass, u.created_at";
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing the SQL query: " . $conn->error);
}

if ($result->num_rows > 0) {
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>User ID</th>';
    echo '<th>Name</th>';
    echo '<th>Email</th>';
    echo '<th>Password</th>';
    echo '<th>Results</th>';
    echo '<th>Diagnosis</th>';
    echo '<th>Created</th>';
    echo '<th>Action</th>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['user_id'] . '</td>';
        echo '<td>' . $row['first_name'] . ' ' . $row['last_name'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['pass'] . '</td>'; // Corrected missing </td> tag

        echo '<td>';
        // Process and display results for each user
        $results = explode(',', $row['results']);
        $resultCount = count($results);
        foreach ($results as $key => $resultValue) {
            echo $resultValue;
            if ($key < $resultCount - 1) {
                echo ',<br>';
            }
        }
        echo '</td>';
        
        echo '<td>';
        $diagnosisText = '';
        foreach ($results as $key => $resultValue) {
            $diagnosis = '';
            if ($resultValue >= 1 && $resultValue <= 10) {
                $diagnosis = 'These ups and downs are considered normal';
            } elseif ($resultValue >= 11 && $resultValue <= 16) {
                $diagnosis = 'Mild mood disturbance';
            } elseif ($resultValue >= 17 && $resultValue <= 20) {
                $diagnosis = 'Borderline clinical depression';
            } elseif ($resultValue >= 21 && $resultValue <= 30) {
                $diagnosis = 'Moderate depression';
            } elseif ($resultValue >= 31 && $resultValue <= 40) {
                $diagnosis = 'Severe depression';
            } elseif ($resultValue > 40) {
                $diagnosis = 'Extreme depression';
            }
            $diagnosisText .= $diagnosis;
            if ($key < $resultCount - 1) {
                $diagnosisText .= ',<br>';
            }
        }
        echo $diagnosisText;
        echo '</td>';
        
        echo '<td>' . $row['created_at'] . '</td>';
        echo '<td><a href="../controller/deleteUser.php?user_id=' . $row['user_id'] . '" onclick="return confirm(\'Are you sure you want to delete this user and related results?\')"><button>Delete</button></a></td>';

        echo '</tr>';
    }
}

$conn->close();
?>
