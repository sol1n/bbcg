<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>BBCG — B2B Conference group</title>
    <link rel="stylesheet" href="../assets/build/style.min.css">
    <meta name="theme-color" content="#1b1b1b">
</head>
<body>

<?php include "blocks/header.php"; ?>
<?php include "blocks/offcanvas.php"; ?>

<main class="main-container main-container-with-header">
    <div class="main-heading main-heading-red">
        <div class="wrapper">
            <h1 class="main-heading-title">Спикеры</h1>

            <form action="#" method="POST" class="main-heading-search-form">
                <input type="search" name="search" class="main-heading-search-input" placeholder="Поиск">
                <input type="submit" value="" class="main-heading-search-submit">
            </form>
        </div>
    </div>

    <nav class="subnav">
        <div class="wrapper">
            <ul class="subnav-list">
                <li class="subnav-list-item active">
                    <a href="#" class="subnav-link active">
                        <span>Все</span>
                    </a>
                </li>
                <?php
                $alph = ['А', 'Б','В','Г','Д','Е','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ы','Э','Ю','Я',];
                ?>
                <?php foreach ($alph as $letter) : ?>
                    <li class="subnav-list-item">
                        <a href="#" class="subnav-link">
                            <span><?php echo $letter; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>

    <div class="speakers-block">
        <div class="wrapper">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <a href="speakers-item.php" class="speakers-block-card">
                        <div class="speakers-block-card-photo">
                            <img src="../assets/images/tmp/speakers/speaker-1.png" alt="Ковпак Игорь">
                            <div class="speakers-block-card-logo">
                                <img src="../assets/images/tmp/speakers/speakers-logo-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="speakers-block-card-desc">
                            <div class="speakers-block-card-name">
                                Ковпак Игорь
                            </div>
                            <div class="speakers-block-card-title">
                                Основатель, ТС «Кировский»
                                г. Екатеринбург
                            </div>
                            <div class="speakers-block-card-ask-question">
                                Задать вопрос
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <a href="speakers-item.php" class="speakers-block-card">
                        <div class="speakers-block-card-photo">
                            <img src="../assets/images/tmp/speakers/speaker-2.png" alt="Татьяна Луковецкая">
                            <div class="speakers-block-card-logo">
                                <img src="../assets/images/tmp/speakers/speakers-logo-2.jpg" alt="">
                            </div>
                        </div>
                        <div class="speakers-block-card-desc">
                            <div class="speakers-block-card-name">
                                Татьяна Луковецкая
                            </div>
                            <div class="speakers-block-card-title">
                                Глава, Рольф Retail
                            </div>
                            <div class="speakers-block-card-ask-question">
                                Задать вопрос
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <a href="speakers-item.php" class="speakers-block-card">
                        <div class="speakers-block-card-photo">
                            <img src="../assets/images/tmp/speakers/speaker-3.png" alt="Adam Elman">
                            <div class="speakers-block-card-logo">
                                <img src="../assets/images/tmp/speakers/speakers-logo-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="speakers-block-card-desc">
                            <div class="speakers-block-card-name">
                                Adam Elman
                            </div>
                            <div class="speakers-block-card-title">
                                Global Head of Delivery for Plan A, Marks & Spencer
                            </div>
                            <div class="speakers-block-card-ask-question">
                                Задать вопрос
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <a href="speakers-item.php" class="speakers-block-card">
                        <div class="speakers-block-card-photo">
                            <img src="../assets/images/tmp/speakers/speaker-3.png" alt="Adam Elman">
                            <div class="speakers-block-card-logo">
                                <img src="../assets/images/tmp/speakers/speakers-logo-4.jpg" alt="">
                            </div>
                        </div>
                        <div class="speakers-block-card-desc">
                            <div class="speakers-block-card-name">
                                Adam Elman
                            </div>
                            <div class="speakers-block-card-title">
                                Global Head of Delivery for Plan A, Marks & Spencer
                            </div>
                            <div class="speakers-block-card-ask-question">
                                Задать вопрос
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <a href="speakers-item.php" class="speakers-block-card">
                        <div class="speakers-block-card-photo">
                            <img src="../assets/images/tmp/speakers/speaker-5.png" alt="Jay DeBlank">
                            <div class="speakers-block-card-logo">
                                <img src="../assets/images/tmp/speakers/speakers-logo-5.jpg" alt="">
                            </div>
                        </div>
                        <div class="speakers-block-card-desc">
                            <div class="speakers-block-card-name">
                                Jay DeBlank
                            </div>
                            <div class="speakers-block-card-title">
                                Director of Reporting, Insights,
                                & Analytics, 7-Eleven, Даллас
                            </div>
                            <div class="speakers-block-card-ask-question">
                                Задать вопрос
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <a href="speakers-item.php" class="speakers-block-card">
                        <div class="speakers-block-card-photo">
                            <img src="../assets/images/tmp/speakers/speaker-1.png" alt="Ковпак Игорь">
                            <div class="speakers-block-card-logo">
                                <img src="../assets/images/tmp/speakers/speakers-logo-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="speakers-block-card-desc">
                            <div class="speakers-block-card-name">
                                Ковпак Игорь
                            </div>
                            <div class="speakers-block-card-title">
                                Основатель, ТС «Кировский»
                                г. Екатеринбург
                            </div>
                            <div class="speakers-block-card-ask-question">
                                Задать вопрос
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <a href="speakers-item.php" class="speakers-block-card">
                        <div class="speakers-block-card-photo">
                            <img src="../assets/images/tmp/speakers/speaker-2.png" alt="Татьяна Луковецкая">
                            <div class="speakers-block-card-logo">
                                <img src="../assets/images/tmp/speakers/speakers-logo-2.jpg" alt="">
                            </div>
                        </div>
                        <div class="speakers-block-card-desc">
                            <div class="speakers-block-card-name">
                                Татьяна Луковецкая
                            </div>
                            <div class="speakers-block-card-title">
                                Глава, Рольф Retail
                            </div>
                            <div class="speakers-block-card-ask-question">
                                Задать вопрос
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <a href="speakers-item.php" class="speakers-block-card">
                        <div class="speakers-block-card-photo">
                            <img src="../assets/images/tmp/speakers/speaker-3.png" alt="Adam Elman">
                            <div class="speakers-block-card-logo">
                                <img src="../assets/images/tmp/speakers/speakers-logo-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="speakers-block-card-desc">
                            <div class="speakers-block-card-name">
                                Adam Elman
                            </div>
                            <div class="speakers-block-card-title">
                                Global Head of Delivery for Plan A, Marks & Spencer
                            </div>
                            <div class="speakers-block-card-ask-question">
                                Задать вопрос
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <a href="speakers-item.php" class="speakers-block-card">
                        <div class="speakers-block-card-photo">
                            <img src="../assets/images/tmp/speakers/speaker-1.png" alt="Ковпак Игорь">
                            <div class="speakers-block-card-logo">
                                <img src="../assets/images/tmp/speakers/speakers-logo-1.jpg" alt="">
                            </div>
                        </div>
                        <div class="speakers-block-card-desc">
                            <div class="speakers-block-card-name">
                                Ковпак Игорь
                            </div>
                            <div class="speakers-block-card-title">
                                Основатель, ТС «Кировский»
                                г. Екатеринбург
                            </div>
                            <div class="speakers-block-card-ask-question">
                                Задать вопрос
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <a href="speakers-item.php" class="speakers-block-card">
                        <div class="speakers-block-card-photo">
                            <img src="../assets/images/tmp/speakers/speaker-2.png" alt="Татьяна Луковецкая">
                            <div class="speakers-block-card-logo">
                                <img src="../assets/images/tmp/speakers/speakers-logo-2.jpg" alt="">
                            </div>
                        </div>
                        <div class="speakers-block-card-desc">
                            <div class="speakers-block-card-name">
                                Татьяна Луковецкая
                            </div>
                            <div class="speakers-block-card-title">
                                Глава, Рольф Retail
                            </div>
                            <div class="speakers-block-card-ask-question">
                                Задать вопрос
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <a href="speakers-item.php" class="speakers-block-card">
                        <div class="speakers-block-card-photo">
                            <img src="../assets/images/tmp/speakers/speaker-3.png" alt="Adam Elman">
                            <div class="speakers-block-card-logo">
                                <img src="../assets/images/tmp/speakers/speakers-logo-3.jpg" alt="">
                            </div>
                        </div>
                        <div class="speakers-block-card-desc">
                            <div class="speakers-block-card-name">
                                Adam Elman
                            </div>
                            <div class="speakers-block-card-title">
                                Global Head of Delivery for Plan A, Marks & Spencer
                            </div>
                            <div class="speakers-block-card-ask-question">
                                Задать вопрос
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-3">
                    <a href="speakers-item.php" class="speakers-block-card">
                        <div class="speakers-block-card-photo">
                            <img src="../assets/images/tmp/speakers/speaker-3.png" alt="Adam Elman">
                            <div class="speakers-block-card-logo">
                                <img src="../assets/images/tmp/speakers/speakers-logo-4.jpg" alt="">
                            </div>
                        </div>
                        <div class="speakers-block-card-desc">
                            <div class="speakers-block-card-name">
                                Adam Elman
                            </div>
                            <div class="speakers-block-card-title">
                                Global Head of Delivery for Plan A, Marks & Spencer
                            </div>
                            <div class="speakers-block-card-ask-question">
                                Задать вопрос
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="pagination pagination-inverse text-center m-t-xl m-b-xl">
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
    </div>
</main>

<?php include "blocks/footer.php"; ?>

<script src="../assets/build/scripts.min.js"></script>
</body>
</html>