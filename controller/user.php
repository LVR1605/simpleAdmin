<?php

require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);

$id = $_GET['id'];
$sql = "SELECT * FROM admins WHERE id = $id";
$result = $conn->query($sql);

$conn->close();