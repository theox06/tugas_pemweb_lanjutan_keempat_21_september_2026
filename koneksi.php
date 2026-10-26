<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=pemweb_lanjutan_minggu_keempat;charset=utf8mb4',
    'root',
    '',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);

$koneksi = mysqli_connect("localhost", "root", "", "pemweb_lanjutan_minggu_keempat");


if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

?>