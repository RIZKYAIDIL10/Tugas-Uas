<?php
// profil.php
session_start();

include 'conn.php'; // Sesuaikan dengan nama file dan path yang sesuai

// Cek apakah pengguna sudah login, jika tidak, arahkan ke halaman login
if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit();
}

// Ambil data pengguna dari sesi
$user_id = $_SESSION['userID'];

// Ambil informasi pengguna dari database (contoh: user_tbl)
$queryUserInfo = mysqli_query($conn, "SELECT * FROM user_tbl WHERE userID = '$user_id'");
$rowUserInfo = mysqli_fetch_assoc($queryUserInfo);

// Pastikan nomor HP ada sebelum mencoba mengaksesnya
$user_hp = isset($rowUserInfo['no_hp']) ? $rowUserInfo['no_hp'] : 'Nomor HP tidak tersedia';

$user_name = $rowUserInfo['nama']; // Gantilah dengan cara mengambil nama pengguna dari database atau sesuai kebutuhan
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <style>
    body {
    margin: 0;
    background: linear-gradient(45deg, #49a09d, #5f2c82);
    font-family: sans-serif;
    font-weight: 100;
    color: #000;  /* Warna teks hitam */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

header {
    background-color: #5957f9;
    color: #fff;
    padding: 10px 0;
    width: 100%;
    text-align: center;
}

.container {
    display: flex;
    justify-content: center;
    margin-top: 2rem;
}

.card {
    background-color: #fff;
    width: 280px;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    padding: 2rem !important;
}

.middle-container {
    background-color: #eee;
    border-radius: 12px;
    margin-top: 20px;
    padding: 10px;
}

.middle-container:hover {
    border: 1px solid #5957f9;
}

.profile-image {
    border-radius: 10px;
    border: 2px solid #5957f9;
    max-width: 100%;
    margin-bottom: 10px;
}

.user-info {
    text-align: center;
    margin-bottom: 10px;
}

h2 {
    margin-bottom: 10px;
}

.user-details {
    font-size: 16px;
    margin-bottom: 5px;
    color: #000;  /* Warna teks hitam */
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 15px;
}

   </style>
</head>

<body>

    <header>
    <?php
require_once('layout/header.php');
require_once('layout/navbar.php');
?>
    </header>

    <div class="container">
        <div class="card">
            <div class="middle-container">
                <div class="user-info">
                    <h2>Selamat datang, <?php echo $user_name; ?>!</h2>
                    <?php
                    // Cek apakah ada gambar profil
                    if (!empty($rowUserInfo['profile_image'])) {
                        $uploadDirectory = "profile/" . $rowUserInfo['profile_image'];
                        echo '<img class="profile-image" src="' . $uploadDirectory . '" alt="Profile Image">';
                    }
                    ?>
                    <p><?php echo $rowUserInfo['nama']; ?></p>
                </div>

                <h3>Informasi Lengkap Pengguna</h3>
                <div class="user-details">
                    <p>ID Pengguna: <?php echo $rowUserInfo['userID']; ?></p>
                    <p>Username: <?php echo $rowUserInfo['username']; ?></p>
                    <p>No HP: <?php echo $user_hp; ?></p>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </div>

                <button onclick="window.location.href='logout.php'">Logout</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
