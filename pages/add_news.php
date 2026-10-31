<?php
require_once __DIR__ . '/../koneksi.php';

$sql = "SHOW COLUMNS FROM `berita_pengumuman` LIKE 'jenis_berita'";

$result = mysqli_query($koneksi, $sql);
$column = mysqli_fetch_assoc($result);

$enumValues = [];

if ($column && preg_match('/^enum\((.*)\)$/i', $column['Type'], $matches)) {
    $enumValues = str_getcsv($matches[1], ',', "'");
}



?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow-sm p-4">
                <h3 class="text-center mb-4">Tambah Berita / Pengumuman</h3>

                <form id="newsForm" action="pages/insert_news.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Jenis Berita</label>
                        <select name="jenis_berita" id="" class="form-control">
                            <option disabled> -- PILIH JENIS BERITA --</option>

                            <?php foreach ($enumValues as $value): ?>
                                <option value="<?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?>">
                                    <?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?>
                                </option>

                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Foto Cover</label>
                        <input type="file" name="thumbnail" class="form-control" accept="image/jpeg,image/png,image/webp">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Headline</label>
                        <input type="text" name="headline" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Konten</label>
                        <div id="editor" style="height: 300px;"></div>
                        <input type="hidden" name="konten" id="konten"></input>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Penulis</label>
                        <input type="text" name="penulis" class="form-control">
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="submit" class="btn-class btn-solid theme-primary">Kirim</button>
                        <a href="index.php?page=news" class="btn btn-outline-secondary mb-4">
                            &larr; Kembali ke Daftar Berita
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>