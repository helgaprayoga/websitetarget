<?php
// Konfigurasi database
$host = "localhost"; // Host database, biasanya "localhost"
$username = "root";      // Username database, default XAMPP adalah "root"
$password = "";          // Password database, default XAMPP kosong
$database = "db_siber"; // Nama database yang sudah Anda buat

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
