<?php

$currentPage = $page ?? 'home';

$isActive = static fn(string $target): string =>
    $currentPage === $target ? 'active' : '';

?>

<nav class="navbar sm:navbar-expand bg-1 fg-2">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Portal Cemara Band</a>
            <button class="btn-icon navbar-toggler" type="button" data-bs-toggle="drawer" data-bs-target="#navbarNav" arial-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon" aria-hidden="true"></span>
            </button>
            <dialog class="drawer drawer-end" tabindex="-1" id="navbarNav" aria-labelledby="navbarNavLabel">
                <div class="drawer-header">
                    <h5 class="drawer-title" id="navbarNavLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="drawer" aria-label="Close"></button>
                </div>
                <div class="drawer-body">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a 
                                <?= $currentPage === 'home' ?> href="index.php?page=home" class="nav-link <?= $isActive('home') ?>" 
                                aria-current="page">Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a 
                                <?= $currentPage === 'news' ?> href="index.php?page=news" class="nav-link <?= $isActive('news') ?>" 
                                aria-current="page">Berita dan Pengumuman

                            </a>
                        </li>
                        <li class="nav-item">
                            <a 
                                <?= $currentPage === 'article' ?> href="index.php?page=article" class="nav-link <?= $isActive('article') ?>"
                                aria-current="page">Artikel</a>
                        </li>
                    </ul>
                </div>
            </dialog>
        </div>
    </nav>