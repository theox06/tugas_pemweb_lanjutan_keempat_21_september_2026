<?php
require_once __DIR__ . '/../koneksi.php';

$sql = "SHOW COLUMNS FROM `berita_pengumuman` LIKE 'jenis_berita'";

$column = $pdo->query($sql)->fetch();

$enumValues = [];

if ($column && preg_match('/^enum\((.*)\)$/i', $column['Type'], $matches)) {
    $enumValues = str_getcsv($matches[1], ',', "'");
}



?>

<form action="index.php?=insert_news.php" method="POST" enctype="multipart/form-data">
    <div class="form-field">
        <label for="" class="form-label">Jenis Berita</label>
        <select name="" id="" class="form-control">
            <option disabled>-- PILIH JENIS BERITA --</option>

            <?php foreach ($enumValues as $value): ?>
                <option value="<?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?>
                </option>
            
            <?php endforeach; ?>
        </select>

        <label for="" class="form-label">Foto Cover</label>
        <input type="file" name="thumbnail" class="form-control" accept="image/jpeg,image/png,image/webp">

        <label for="" class="form-label">Headline</label>
        <input type="text" name="headline" class="form-control">

        <label for="" class="form-label">Konten</label>
        <textarea name="" id="" class="form-control"></textarea>

        <label for="" class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control">
        
    </div>
</form>
