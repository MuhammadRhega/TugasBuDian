<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek apakah NIK sudah terdaftar
    $sql = "SELECT * FROM users WHERE nik='$nik'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "NIK sudah terdaftar!";
    } else {
        // Memasukkan pengguna baru ke database
        $sql = "INSERT INTO users (nik, username, password) VALUES ('$nik', '$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Pendaftaran berhasil!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
