<?php
require_once __DIR__ . '/../koneksi.php';

$enumResult = mysqli_query($koneksi, "SHOW COLUMNS FROM berita_pengumuman LIKE 'jenis_berita'");

$enumRow = mysqli_fetch_assoc($enumResult);

preg_match_all("/'([^']+)'/", $enumRow['type'], $matches);
$enumValues = $matches[1];

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM berita_pengumuman WHERE id='$id'");
while ($d = mysqli_fetch_array($data)) {
?>
    <form id="newsForm" action="pages/update_news.php" method="POST" enctype="multipart/form-data">
    <div class="form-field">
        <label for="" class="form-label">Jenis Berita</label>
        <select name="jenis_berita" id="" class="form-control">
            <option disabled>-- PILIH JENIS BERITA --</option>
            <?php foreach ($enumValues as $value): ?>
                <option value="<?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?>" <?= $value === $d['jenis_berita'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?>
                </option>
            
            <?php endforeach; ?>
        </select>

        <label for="" class="form-label">Foto Cover</label>
        <input type="file" name="thumbnail" class="form-control" accept="image/jpeg,image/png,image/webp">

        <label for="" class="form-label">Headline</label>
        <input type="text" name="headline" class="form-control">

        <label for="" class="form-label">Konten</label>
        <div id="editor" style="height: 300px;"></div>
        <input type="hidden" name="konten" id="editor"></textarea>

        <label for="" class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control">

        <button type="submit" class="btn-class btn-solid theme-primary">Kirim</button>



        
        
        
    </div>
</form>
    <?php
}

?>