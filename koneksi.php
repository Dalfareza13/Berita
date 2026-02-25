<?php
// Pengaturan Database
$host     = "localhost";
$user     = "root";
$password = "";
$database = "pln_news";

// Melakukan koneksi ke MySQL
$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Set charset ke UTF-8 agar karakter simbol/huruf tampil sempurna
mysqli_set_charset($koneksi, "utf8");
?>