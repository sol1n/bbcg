<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>BBCG — B2B Conference group</title>
    <link rel="stylesheet" href="../assets/build/style.min.css">
    <meta name="theme-color" content="#1b1b1b">
    <link rel="icon" type="image/png" href="../favicon.png" />
</head>
<body>

<?php include "blocks/header.php"; ?>
<?php include "blocks/offcanvas.php"; ?>

<main class="main-container main-container-with-header">
    <div class="main-heading main-heading-black">
        <div class="wrapper">
            <h1 class="main-heading-title">
                <a href="#">
                    Новости
                </a>
            </h1>

            <form action="#" method="POST" class="main-heading-search-form">
                <input type="search" name="search" class="main-heading-search-input" placeholder="Поиск">
                <input type="submit" value="" class="main-heading-search-submit">
            </form>
        </div>
    </div>

    <nav class="subnav">
        <div class="wrapper">
            <ul class="subnav-list subnav-list-wide">
                <li class="subnav-list-item active">
                    <a href="news.php" class="subnav-link active">
                        <span>Все</span>
                    </a>
                </li>
                <li class="subnav-list-item">
                    <a href="news.php" class="subnav-link">
                        <span>Фотогалерея</span>
                    </a>
                </li>
                <li class="subnav-list-item">
                    <a href="news.php" class="subnav-link">
                        <span>Видео</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="wrapper m-t-md m-b-md">
        <div class="row">
            <?php for ($i = 1; $i <= 2; $i++) : ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="#" class="news-block-item news-block-item-with-photo m-b-md">
                    <div class="news-block-item-photo">
                        <img src="../assets/images/tmp/news/news-1.jpg" alt="">
                    </div>
                    <div class="news-block-item-content">
                        <div class="news-block-item-title">
                            «ВШЭУ» запустила программу «Менеджмент в ритейле»
                        </div>
                        <div class="news-block-item-meta">
                            <div class="news-block-item-date">
                                26 октября
                            </div>
                            <div class="news-block-item-readmore">
                                <?php include "../assets/images/icons/icon-news-readmore.svg"; ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="#" class="news-block-item news-block-item-with-photo m-b-md">
                    <div class="news-block-item-photo">
                        <img src="../assets/images/tmp/news/news-2.jpg" alt="">
                    </div>
                    <div class="news-block-item-content">
                        <div class="news-block-item-title">
                            Приглашаем на деловые экскурсии
                        </div>
                        <div class="news-block-item-meta">
                            <div class="news-block-item-date">
                                26 октября
                            </div>
                            <div class="news-block-item-readmore">
                                <?php include "../assets/images/icons/icon-news-readmore.svg"; ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="#" class="news-block-item news-block-item-blank m-b-md">
                    <div class="news-block-item-content">
                        <div class="news-block-item-title">
                            Ретейлеры для директоров
                            по Ритейлу: Инновации
                            в управлении ритейлом (розничным блоком)!
                        </div>
                        <div class="news-block-item-meta">
                            <div class="news-block-item-date">
                                26 октября
                            </div>
                            <div class="news-block-item-readmore">
                                <?php include "../assets/images/icons/icon-news-readmore.svg"; ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="#" class="news-block-item news-block-item-with-photo m-b-md">
                    <div class="news-block-item-photo">
                        <img src="../assets/images/tmp/news/news-3.jpg" alt="">
                    </div>
                    <div class="news-block-item-content">
                        <div class="news-block-item-title">
                            Меркурий: от теории к практике
                        </div>
                        <div class="news-block-item-meta">
                            <div class="news-block-item-date">
                                26 октября
                            </div>
                            <div class="news-block-item-readmore">
                                <?php include "../assets/images/icons/icon-news-readmore.svg"; ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="#" class="news-block-item news-block-item-blank m-b-md">
                    <div class="news-block-item-content">
                        <div class="news-block-item-title">
                            Мастер-класс по европейской кухне
                        </div>
                        <div class="news-block-item-meta">
                            <div class="news-block-item-date">
                                26 октября
                            </div>
                            <div class="news-block-item-readmore">
                                <?php include "../assets/images/icons/icon-news-readmore.svg"; ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="#" class="news-block-item news-block-item-blank m-b-md">
                    <div class="news-block-item-content">
                        <div class="news-block-item-title">
                            Ретейлеры для директоров
                            по Ритейлу: Инновации
                            в управлении ритейлом (розничным блоком)!
                        </div>
                        <div class="news-block-item-meta">
                            <div class="news-block-item-date">
                                26 октября
                            </div>
                            <div class="news-block-item-readmore">
                                <?php include "../assets/images/icons/icon-news-readmore.svg"; ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endfor; ?>
        </div>

        <div class="pagination text-center m-b-xl">
            <ul class="pagination-list">
                <li class="pagination-list-item disabled">
                    <span class="pagination-link pagination-link-prev">
                        <?php include "../assets/images/icons/icon-pagination-prev.svg"; ?>
                    </span>
                </li>
                <li class="pagination-list-item active">
                    <span class="pagination-link">1</span>
                </li>
                <li class="pagination-list-item">
                    <a href="#" class="pagination-link">2</a>
                </li>
                <li class="pagination-list-item">
                    <a href="#" class="pagination-link">3</a>
                </li>
                <li class="pagination-list-item">
                    <a href="#" class="pagination-link">4</a>
                </li>
                <li class="pagination-list-item">
                    <a href="#" class="pagination-link">5</a>
                </li>
                <li class="pagination-list-item">
                    <a href="#" class="pagination-link pagination-link-next">
                        <?php include "../assets/images/icons/icon-pagination-next.svg"; ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</main>

<?php include "blocks/footer.php"; ?>

<script src="../assets/build/scripts.min.js"></script>
</body>
</html>