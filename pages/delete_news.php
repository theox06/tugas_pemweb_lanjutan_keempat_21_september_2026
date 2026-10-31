<?php
include_once __DIR__ . '/../koneksi.php';

$id = $_GET['id'];

if ($id) {
    $dataLama = mysqli_query($koneksi, "SELECT thumbnail FROM berita_pengumuman WHERE id='$id'");
    $row = mysqli_fetch_assoc($dataLama);

    if ($row && !empty($row['thumbnail'])) {
        $filePath = __DIR__ . '/../' . $row['thumbnail'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
    mysqli_query($koneksi, "DELETE FROM berita_pengumuman WHERE id='$id'");
}


header("Location: ../index.php?page=news");
exit;
?>