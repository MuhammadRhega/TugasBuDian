<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        die('User not logged in');
    }

    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $title = $conn->real_escape_string($title);
    $content = $conn->real_escape_string($content);

    $sql = "INSERT INTO notes (user_id, title, content) VALUES ('$user_id', '$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "Note added successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
