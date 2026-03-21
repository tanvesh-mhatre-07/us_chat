<?php
session_start();
include "db.php";

if (isset($_POST['message'])) {
    $user_id = $_SESSION['user_id'];
    $message = $_POST['message'];

    $conn->query("INSERT INTO messages (user_id, message) 
                  VALUES ('$user_id', '$message')");
}

header("Location: home.php");
?>