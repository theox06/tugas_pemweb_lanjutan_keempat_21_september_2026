<?php
require_once __DIR__ . '/../koneksi.php';

$stmt = $pdo->query("
    SELECT id, 
    jenis_berita, 
    thumbnail,
    headline,
    konten,
    penulis,
    waktu_publikasi 
    FROM berita_pengumuman
    ORDER BY id DESC
");

$beritaPengumuman = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<main class="content justify-items-center">
    <h1>Berita dan Pengumuman</h1>
    <br>
    <div class="text-center">
        <a href="index.php?page=add_news" class="btn-solid theme-primary">Buat Berita dan Pengumuman</a>
    </div>

    <br>
    <br>

    <?php if (!empty($beritaPengumuman)): ?>
        <?php foreach ($beritaPengumuman as $data): ?>
            <div class="d-flex space-x-3 p-3 bd-pattern-diagonal rounded-3">
                <section class="card" style="max-width: 320px;">
                    <img src="<?= htmlspecialchars($data['thumbnail']) ?>?>" class="card-img-top" alt="news-article-img" width="320" height="144">
                    <div class="card-body">
                        <h4 class="card-title"><?=  htmlspecialchars($data['headline']) ?></h4>
                        <p class="card-text"><?=  htmlspecialchars($data['konten']) ?></p>
                        <p class="card-text">Ditulis oleh: <b><?=  htmlspecialchars($data['penulis']) ?></b></p>
                        <a href="#" class="btn-solid theme-primary">Baca selengkapnya</a>
                    </div>
                </section>
            </div>
        <?php endforeach; ?>

        <?php else: ?>
            <h1>Belum ada berita/pengumuman</h1>

    <?php endif; ?>
</main>