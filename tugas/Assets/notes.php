<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    die('User not logged in');
}

$user_id = $_SESSION['user_id'];

// Query untuk mendapatkan semua catatan pengguna
$sql = "SELECT * FROM notes WHERE user_id='$user_id' ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result === FALSE) {
    die('Query failed: ' . $conn->error);
}

if ($result->num_rows > 0) {
    echo '<table class="notes-table">';
    echo '<tr><th>Title</th><th>Content</th><th>Created At</th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td class="note-title">' . htmlspecialchars($row['title']) . '</td>';
        echo '<td class="note-content">' . htmlspecialchars($row['content']) . '</td>';
        echo '<td class="note-timestamp">' . htmlspecialchars($row['created_at']) . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'Anda belum membuat catatatan';
}

$conn->close();
?>
