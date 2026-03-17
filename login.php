<?php
session_start();
include "db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE email='$email'");

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: home.php");
    } else {
        echo "Wrong password!";
    }
} else {
    echo "User not found! <a href='register.html'>Create account</a>";
}
?>