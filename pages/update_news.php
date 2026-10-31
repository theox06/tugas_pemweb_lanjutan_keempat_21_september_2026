<?php
include_once __DIR__ . '/../koneksi.php';


$id = $_POST['id'];
$jenisBerita = $_POST['jenis_berita'];

$dataLama = mysqli_query($koneksi, "SELECT thumbnail FROM berita_pengumuman WHERE id='$id'");
$row = mysqli_fetch_assoc($dataLama);
$fotoLama = $row['thumbnail'];

$file = $_FILES['thumbnail'];
if ($file && $file['error'] === UPLOAD_ERR_OK) {
    

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

    if ($fotoLama && file_exists(__DIR__ . '/../' . $fotoLama)) {
        unlink(__DIR__ . '/../' . $fotoLama);
    }

    $thumbnailPath = 'photos/' . $filename;
} else {
    $thumbnailPath = $fotoLama;
}

$headline = mysqli_real_escape_string($koneksi, $_POST['headline']);
$konten = mysqli_real_escape_string($koneksi, $_POST['konten']);
$penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);

mysqli_query($koneksi, "UPDATE berita_pengumuman SET
    jenis_berita = '$jenisBerita',
    thumbnail = '$thumbnailPath',
    headline = '$headline',
    konten = '$konten',
    penulis = '$penulis',
    waktu_publikasi = NOW()
    WHERE id = '$id'");

header("Location: ../index.php?page=news");
exit;