<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Results</title>
</head>
<body>
    <h1>Results Table</h1>
    <div class="button-container">
        <button><a class="text-white" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a></button>
        <button><a class="text-white" href="../viewAdmin/adminDashboard.php">Home</a></button>
    </div>

    <!-- Search bar and button -->
    <input type="text" id="searchInput" placeholder="Search by Result ID">
    <button id="searchButton" onclick="searchResults()">Search</button>

    <table>
        <?php
        include "../controller/results.php";
        ?>
    </table>

    <button id="goBackButton">Go Back Up</button>

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
        document.addEventListener("DOMContentLoaded", function () {
            // JavaScript to scroll back to the top of the page when the button is clicked
            const goBackButton = document.getElementById("goBackButton");

            goBackButton.addEventListener("click", () => {
                window.scrollTo({
                top: 0,
                behavior: "smooth"
                });
            });
        });
    </script>
    <style>
        .highlighted {
            background-color: yellow; /* You can adjust the background color as needed */
        }
    </style>
</body>
</html>