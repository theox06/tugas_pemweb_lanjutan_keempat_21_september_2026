<?php

include_once __DIR__ . '/../koneksi.php';

$jenis_berita = $_POST['jenis_berita'];
$file = $_FILES['thumbnail'];
if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
    throw new RuntimeException('Gagal menerima file gambar');
}

$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($file['tmp_name']);

$extensions = [
    'image/jpeg' => 'jpg',
    'image/png'  => 'png',
    'image/webp' => 'webp',
];

if (!isset($extensions[$mime])) {
    throw new RuntimeException('Format file tidak didukung.');
}

$filename = bin2hex(random_bytes(16)) . '.' . $extensions[$mime];
$uploadDir = __DIR__ . '/../photos';

if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
    throw new RuntimeException('Folder upload tidak dapat dibuat.');
}
if (!move_uploaded_file(
    $file['tmp_name'], 
    $uploadDir . DIRECTORY_SEPARATOR . $filename
    )) {
    throw new RuntimeException('Gambar gagal disimpan.');
}

$thumbnailPath = 'photos/' . $filename;

$headline = $_POST['headline'];
$konten = $_POST['konten'];
$penulis = $_POST['penulis'];

mysqli_query($koneksi, "INSERT INTO berita_pengumuman VALUES(NULL, '$jenis_berita', '$thumbnailPath', '$headline', '$konten', '$penulis', NOW())");

header("location:../index.php");

?>