<?php

require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

// prepare and bind
$stmt = $conn->prepare("INSERT INTO admins (admin_first_name, admin_last_name, admin_email, admin_pass) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $firstname, $lastname, $email, $pass);

// set parameters
$firstname = $_POST["admin_first_name"]; 
$lastname = $_POST["admin_last_name"];
$email = $_POST["admin_email"];
$pass = $_POST["admin_pass"];

// execute
$stmt->execute();

$stmt->close();
$conn->close();

header("location: ../adminDashboard.php?save-success=true");
