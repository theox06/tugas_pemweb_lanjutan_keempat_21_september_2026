<?php

$pages = [
    'home'  => __DIR__ . '/pages/home.php',
    'news'  => __DIR__ . '/pages/news.php',
    'add_news'  => __DIR__ . '/pages/add_news.php',
    'view_news' => __DIR__ . '/pages/view_news.php',
    'edit_news' => __DIR__ . '/pages/edit_news.php',
];

$page = $_GET['page'] ?? 'home';
$contentFile = $pages[$page] ?? null;

if ($contentFile === null) {
    http_response_code(404);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

</head>

<body class="d-flex flex-column min-vh-100">

    <?php require __DIR__ . '/includes/nav.php' ?>

    <main>
        <?php
        if ($contentFile !== null) {
            require $contentFile;
        } else {
            echo '<h1>404 - Halaman Tidak Ditemukan</h1>';
        }
        ?>
    </main>

    <?php require __DIR__ . '/includes/footer.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script>
        const editorEl = document.getElementById('editor');
        const formEl = document.getElementById('newsForm');

        if (editorEl && formEl) {
            const quill = new Quill('#editor', {
                theme: 'snow'
            });

            document.getElementById('newsForm').addEventListener('submit', function() {
                document.getElementById('konten').value = quill.root.innerHTML;
            });
        }
    </script>

</body>

</html>