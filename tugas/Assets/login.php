<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST['nik'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE nik='$nik'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo "Login sukses";
        } else {
            echo "Password salah!";
        }
    } else {
        echo "NIK tidak ditemukan!";
    }
}

$conn->close();
?>
