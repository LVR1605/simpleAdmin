<?php

require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

$sql = "SELECT * FROM result";
$result = $conn->query($sql);

$conn->close();

if ($result->num_rows > 0) {
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Result ID</th>';
    echo '<th>User ID</th>';
    echo '<th>Result</th>';
    echo '<th>Diagnosis</th>';
    echo '<th>User Data</th>';
    echo '</tr>';
    

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td class="result-id">' . $row['result_id'] . '</td>';
        echo '<td>' . $row['user_id'] . '</td>';
        echo '<td>' . $row['result'] . '</td>';
        
        // Determine diagnosis based on 'result' column
        $diagnosis = '';
        $resultValue = $row['result'];

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

        echo '<td>' . $diagnosis . '</td>';
        
        // Pass user_id as a query parameter in the link
        echo '<td><a href="../viewAdmin/viewUsers.php?user_id=' . $row['user_id'] . '">View Data</a></td>';

        echo '</tr>';
    }
}
?>
