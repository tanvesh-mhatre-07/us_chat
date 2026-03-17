<?php
$conn = new mysqli("localhost", "root", "", "us_chat");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>