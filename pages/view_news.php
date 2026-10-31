<?php
    require_once __DIR__ . '/../koneksi.php';

    $id = filter_input(
        INPUT_GET,
        'id',
        FILTER_VALIDATE_INT
    );

    $berita = false;

    if ($id !== false && $id !== null && $id > 0) {
        $stmt = $pdo->prepare("
            SELECT id, jenis_berita, thumbnail, headline, konten, penulis, waktu_publikasi
            FROM berita_pengumuman
            WHERE id = :id
            LIMIT 1
        ");

        $stmt->execute([
            'id' => $id,
        ]);

        $berita = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if (!$berita) {
        http_response_code(404);
        ?>

        <div class="container py-5">
            <h1>Berita atau pengumuman tidak ditemukan</h1>

            <p>Berita atau pengumuman mungkin tidak tersedia atau sudah dihapus</p>

            <a href="index.php?page=news" class="btn theme-primary">Kembali ke Daftar Berita</a>
        </div>

        <?php

    } else {
        ?>

        <article class="container py-5">

            <a href="index.php?page=news" class="btn btn-outline-secondary mb-4">
                &larr; Kembali ke Daftar Berita
            </a>

            <h1 class="mb-3">
                <?= htmlspecialchars($berita['headline']) ?>
            </h1>

            <?php if(!empty($berita['waktu_publikasi'])):?>
                <p class="text-muted">
                    Dipublikasikan pada
                    <?= htmlspecialchars(date('d-m-Y H:i',strtotime($berita['waktu_publikasi'])
                    )
                    ) ?>
                </p>
            <?php endif;?>

            <?php if (!empty($berita['thumbnail'])): ?>
                <img 
                    src="<?= htmlspecialchars(
                        $berita['thumbnail'],
                        ENT_QUOTES,
                        'UTF-8' 
                    )   ?>" 
                    alt="<?= htmlspecialchars(
                        $berita['headline'],
                        ENT_QUOTES,
                        'UTF-8' 
                    )   ?>" 
                    class="img-fluid rounded mb-4"
                >
            <?php endif; ?>

            <div class="article-content ql-snow" id="konten">
                <div class="ql-editor p-0">
                    <?= $berita['konten'] ?? '' ?>
                </div>
            </div>
        </article>

        <?php
    }
?>