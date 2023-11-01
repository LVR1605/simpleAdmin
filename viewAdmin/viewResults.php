<!DOCTYPE html>
<html>
<head>
    <title>View Results</title>
    <style>
        .highlighted {
            background-color: yellow;
        }
    </style>
</head>
<body>

<h1>Results Table</h1>
    <div class="button-container">
        <button><a class="text-white" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></button>
        <button><a class="text-white" href="../adminDashboard.php">Home</a></button>
    </div>

    <!-- Search bar and button -->
    <input type="text" id="searchInput" placeholder="Search by Result ID">
    <button id="searchButton" onclick="searchResults()">Search</button>

<?php
require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

$sql = "SELECT * FROM result";
$result = $conn->query($sql);

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
$conn->close();
?>
<!-- "Go Back Up" button -->
<?php
    $goBackButton = '<button id="goBackButton">Go Back Up</button>';
    echo $goBackButton;
?>
<script>
    function searchResults() {
        var searchInput = document.getElementById("searchInput").value;
        var resultIds = document.querySelectorAll(".result-id");

        for (var i = 0; i < resultIds.length; i++) {
            var row = resultIds[i].parentNode;
            if (resultIds[i].textContent === searchInput) {
                row.classList.add("highlighted");
                row.scrollIntoView({ behavior: "smooth" });
            } else {
                row.classList.remove("highlighted");
            }
        }
    }
</script>
<script>
    const goBackButton = document.getElementById("goBackButton");

    goBackButton.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

    // Display the "Go Back Up" button when appropriate
    window.addEventListener("scroll", () => {
        if (document.documentElement.scrollTop > 100) {
            goBackButton.style.display = "block";
        } else {
            goBackButton.style.display = "none";
        }
    });
</script>


<style>
        body {
            font-family: 'Work Sans', sans-serif;
            margin: 0;
            padding: 0;
        }
        
        h1 {
            text-align: center;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #584e46;
            color: #fafafa;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #eeeeee;
        }

        /* Search bar and button */
        #searchInput {
            padding: 5px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #searchButton {
            padding: 5px 10px;
            background-color: #584e46;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        /* Back and Home buttons */
        .button-container {
            text-align: center;
        }

        .button-container button {
            padding: 10px 20px;
            background-color: #584e46;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin: 5px;
        }

        /* "Go Back Up" button */
        #goBackButton {
            position: fixed;
            bottom: 10px;
            right: 10px;
            padding: 10px 20px;
            background-color: #584e46;
            color: #fff;
            border: none;
            border-radius: 5px;
            display: none;
        }
        .text-white {
            color: white;
            font-weight: bold;
        }
    </style>
</body>
</html>
