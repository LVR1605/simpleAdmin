<?php

require $_SERVER["DOCUMENT_ROOT"] . '/simpleAdmin/config/dbconnect.php';

$sql = "SELECT * FROM users WHERE deleted_at IS null";
$result = $conn->query($sql);

$sql = "SELECT * FROM admins WHERE deleted_at IS null";
$result = $conn->query($sql);

$conn->close();