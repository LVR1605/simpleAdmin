<?php
require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

$sql = "SELECT * FROM result";
$result = $conn->query($sql);

// Create an array to store diagnosis counts
$diagnosisCounts = array(
    'Normal' => 0,
    'Mild Mood Disturbance' => 0,
    'Borderline Clinical Depression' => 0,
    'Moderate Depression' => 0,
    'Severe Depression' => 0,
    'Extreme Depression' => 0
);

while ($row = $result->fetch_assoc()) {
    // Determine diagnosis based on 'result' column
    $resultValue = $row['result'];

    if ($resultValue >= 1 && $resultValue <= 10) {
        $diagnosisCounts['Normal']++;
    } elseif ($resultValue >= 11 && $resultValue <= 16) {
        $diagnosisCounts['Mild Mood Disturbance']++;
    } elseif ($resultValue >= 17 && $resultValue <= 20) {
        $diagnosisCounts['Borderline Clinical Depression']++;
    } elseif ($resultValue >= 21 && $resultValue <= 30) {
        $diagnosisCounts['Moderate Depression']++;
    } elseif ($resultValue >= 31 && $resultValue <= 40) {
        $diagnosisCounts['Severe Depression']++;
    } elseif ($resultValue > 40) {
        $diagnosisCounts['Extreme Depression']++;
    }
}

$conn->close();

// Now, display the horizontal diagnosis count table
echo '<table border="1">';
echo '<tr>';
foreach ($diagnosisCounts as $diagnosis => $count) {
    echo '<th>' . $diagnosis . '</th>';
}
echo '</tr>';
echo '<tr>';
foreach ($diagnosisCounts as $diagnosis => $count) {
    echo '<td>' . $count . '</td>';
}
echo '</tr>';
echo '</table>';
?>
