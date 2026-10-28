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


<main class="">
    <h1 class="text-center">Berita dan Pengumuman</h1>
    <br>
    <div class="text-center">
        <a href="index.php?page=add_news" class="btn-solid theme-primary">Buat Berita dan Pengumuman</a>
    </div>

    <br>
    <br>

    <style>
        .ne
    </style>

    <?php if (!empty($beritaPengumuman)): ?>
        <div class="container">
            <div class="row justify-content-center g-4">
                <?php foreach ($beritaPengumuman as $data): ?>
                    <?php
                    $kontenTeks = trim(preg_replace(
                        '/\s+/u',
                        ' ',
                        strip_tags(html_entity_decode($data['konten'] ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8'))
                    ));

                    $kontenRingkas = mb_substr($kontenTeks, 0, 120, 'UTF-8');

                    if (mb_strlen($kontenTeks, 'UTF-8') > 120) {
                        $kontenRingkas .= '...';
                    }
                    ?>

                    <div class="col-6 col-md-6 d-flex justify-content-center">
                        <div class="card w-100" style="max-width: 320px;">
                            <img src="<?= htmlspecialchars($data['thumbnail']) ?>" alt="" class="card-img-top" style="height: 160px; object-fit: cover;"></style>
                            <div class="card-body">
                                <a href="" class="btn-solid theme-warning">Edit Berita</a>
                                <h4 class="card-title"><?= htmlspecialchars($data['headline']) ?></h4>
                                <p class="card-text"><?= htmlspecialchars($kontenRingkas, ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text">Ditulis oleh: <b><?= htmlspecialchars($data['penulis']) ?></b></p>
                                <div class="d-flex justify-content-between align-items-center gap-2">
                                    <a href="index.php?page=view_news&amp;id=<?= (int) $data['id'] ?>" class="btn-solid theme-primary">Baca selengkapnya</a>
                                    <a href="" class="btn-solid theme-danger">Hapus Berita</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


    <?php else: ?>
        <h1>Belum ada berita/pengumuman</h1>

    <?php endif; ?>

    <!-- <a href="" class="btn-solid theme-warning">Edit Berita</a>
                            
</main>