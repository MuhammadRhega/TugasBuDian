<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="main.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="navbar">
        <div class="navbar-left">
            <h2>Logo</h2>
        </div>
        <div class="navbar-right">
            <div class="user-info">
                <i class='bx bxs-user'></i> <!-- Ikon User -->
                <span><?php echo $_SESSION['username']; ?></span> <!-- Nama User -->
            </div>
        </div>
    </div>
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><button id="addNoteBtn">Add Note</button></li>
        </ul>
    </div>

    <div class="content">
        <h1>Selamat Datang di Halaman Utama</h1>
        <p>Seluruh data perjalanan anda berada disini.</p>
    
            <!-- Formulir untuk menambahkan catatan -->
            <div id="addNoteForm" style="display: none;">
                <form id="noteForm">
                    <input type="text" name="title" placeholder="Title" required>
                    <textarea name="content" placeholder="Content" required></textarea>
                    <button type="submit">Add Note</button>
                    <button type="button" id="cancelAddNote">Cancel</button>
                </form>
            </div>

            <!-- Daftar catatan -->

            <div id="notesList"></div>

            

    </div>
    <script src="dashboard.js"></script>

</body>
</html>
