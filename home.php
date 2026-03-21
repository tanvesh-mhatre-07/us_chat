<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>UsChat</title>
    <link rel="stylesheet" href="css/stylehome.css">
</head>

<body>

<div class="servers">
    <div class="server">+</div>
    <div class="server">S1</div>
    <div class="server">S2</div>
</div>

<div class="channels">
    <div class="top">
        <strong>Server Name</strong>
    </div>

    <div class="channel"># general</div>
    <div class="channel"># coding</div>
</div>

<div class="chat">
    <h3>Welcome <?php echo $_SESSION['username']; ?> 👋</h3>

    <p>This is your chat area (we’ll make it working next)</p>

    <a href="logout.php" style="color:red;">Logout</a>
    <div id="chat-box" style="height:300px; overflow-y:auto; background:#2f3136; padding:10px;">

<?php
include "db.php";

$result = $conn->query("
    SELECT messages.*, users.username 
    FROM messages 
    JOIN users ON messages.user_id = users.id 
    ORDER BY messages.id ASC
");

while ($row = $result->fetch_assoc()) {
    echo "<p><strong>{$row['username']}:</strong> {$row['message']}</p>";
}
?>

</div>

<form action="send.php" method="POST">
    <input type="text" name="message" placeholder="Type a message..." required>
    <button type="submit">Send</button>
</form>
</div>

</body>
</html>