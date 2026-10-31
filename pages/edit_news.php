<?php
require_once __DIR__ . '/../koneksi.php';

$enumResult = mysqli_query($koneksi, "SHOW COLUMNS FROM berita_pengumuman LIKE 'jenis_berita'");

$enumRow = mysqli_fetch_assoc($enumResult);

preg_match_all("/'([^']+)'/", $enumRow['Type'], $matches);
$enumValues = $matches[1];

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM berita_pengumuman WHERE id='$id'");
while ($d = mysqli_fetch_array($data)) {
?>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                <div class="card shadow-sm p-4">
                    <h3 class="text-center mb-4">Edit Berita / Pengumuman</h3>

                    <form id="newsForm" action="pages/update_news.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?= $d['id'] ?>">

                        <div class="mb-3">
                            <label for="" class="form-label">Jenis Berita</label>
                            <select name="jenis_berita" id="" class="form-control">
                                <option disabled>-- PILIH JENIS BERITA --</option>
                                <?php foreach ($enumValues as $value): ?>
                                    <option value="<?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?>" <?= $value === $d['jenis_berita'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?>
                                    </option>

                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label fw-bold">Foto Cover</label>
                            <img src="<?= htmlspecialchars($d['thumbnail']) ?>" alt="" style="max-width: 200px;">
                            <input type="file" name="thumbnail" class="form-control" accept="image/jpeg,image/png,image/webp">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Headline</label>
                            <input type="text" name="headline" class="form-control" value="<?= $d['headline'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Konten</label>
                            <div id="editor" style="height: 300px;">
                                <?= $d['konten'] ?>
                            </div>
                            <input type="hidden" name="konten" id="konten">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Penulis</label>
                            <input type="text" name="penulis" class="form-control" value="<?= $d['penulis'] ?>">
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
<?php
}

?>