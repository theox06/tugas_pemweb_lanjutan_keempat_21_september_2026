<main class="content justify-items-center">
    <h1>Berita dan Pengumuman</h1>
    <a href="index.php?page=add_news" class="btn-solid theme-primary">Buat Berita dan Pengumuman</a>

    <br>
    <br>

    <?php foreach ($variable as $key => $value) {
        # code...
    } ?>

    <div class="d-flex space-x-3 p-3 bd-pattern-diagonal rounded-3">
        <section class="card" style="max-width: 320px;">
            <img src="..." class="card-img-top" alt="news-article-img" width="320" height="144">
            <div class="card-body">
                <h4 class="card-title">Card Title</h4>
                <p class="card-text">Lorem Ipsum Dolor Sit Amet</p>
                <p class="card-text">Penulis: </p>
                <a href="#" class="btn-solid theme-primary">Baca selengkapnya</a>
            </div>
        </section>
    </div>
</main>