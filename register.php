<?php
include "db.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Check if email exists
$check = $conn->query("SELECT * FROM users WHERE email='$email'");

if ($check->num_rows > 0) {
    echo "Email already exists!";
} else {
    $conn->query("INSERT INTO users (username, email, password) 
                  VALUES ('$username', '$email', '$password')");
    
    header("Location: login.html");
}
?>