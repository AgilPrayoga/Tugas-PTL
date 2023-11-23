<?php
include 'konsdb.php';

// Ambil data dari formulir login
$username = $_POST['username'];
$password = $_POST['password'];

// Lindungi dari serangan SQL injection
$username = mysqli_real_escape_string($koneksi, $username);
$password = mysqli_real_escape_string($koneksi, $password);

// Query untuk mencari pengguna dengan username yang sesuai
$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) == 1) {
    // Pengguna ditemukan, izinkan login
    session_start();
    $_SESSION['username'] = $username;
    header("location: welcome.php"); // Redirect ke halaman selamat datang
} else {
    // Pengguna tidak ditemukan, tampilkan pesan error
    echo "Login gagal. Silakan coba lagi.";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
