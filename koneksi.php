<?php
$dbHost = 'localhost';
$dbName = 'pemweb_lanjutan_minggu_keempat';
$dbUser = 'admin';
$dbPassword = '';

// untuk password menyesuaikan dengan database, jika default nya kosongan dikosongkan saja

$pdo = new PDO(
    "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4",
    $dbUser,
    $dbPassword,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);

$koneksi = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
if ($koneksi === false) {
    throw new RuntimeException('Koneksi database MySQLi gagal.');
}

mysqli_set_charset($koneksi, 'utf8mb4');