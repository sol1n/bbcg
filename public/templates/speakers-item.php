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

<?php include "blocks/offcanvas.php"; ?>
<?php include "blocks/header.php"; ?>

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

    <div class="wrapper">
        <div class="speaker-block-wrapper">
            <div class="speaker-block p-t-xl p-b-xl">
                <div class="speaker-block-card">
                    <div class="speaker-block-card-text">
                        <div class="speaker-block-name">
                            Ковпак Игорь
                        </div>

                        <div class="speaker-block-title">
                            Основатель, ТС «Кировский»
                            г. Екатеринбург
                        </div>

                        <div class="speaker-block-subtitle">
                            AББ Россия / Ассоциация
                            Европейского Бизнеса
                        </div>
                    </div>
                    <div class="speaker-block-card-photo">
                        <img src="../assets/images/tmp/speakers/speaker-1.png" alt="Ковпак Игорь">
                    </div>
                </div>

                <div class="speaker-block-about">
                    <div class="speaker-block-about-title">
                        О спикере
                    </div>

                    <p>
                        В преддверии Второй международной конференции «Использование результатов исследований качества образования — проблемы и перспективы», которая пройдет в МИА «Россия сегодня» 29-30 сентября, директор Департамента по образованию Организации по экономическому сотрудничеству и развитию Андреас Шляйхер рассказал корреспонденту РИА Новости Антону Звереву о главных выводах престижного исследования за последнее десятилетие и о том, как влияет эта программа на политику образования в разных странах.
                    </p>
                </div>

                <div class="speaker-block-events">
                    <div class="speaker-block-events-title">
                        Выступления
                    </div>
                    <a href="#" class="speaker-block-events-item">
                        <div class="speaker-block-events-item-title">
                            «Система образования как инструмент консолидации городского сообщества»
                        </div>

                        <div class="speaker-block-events-item-meta">
                            <div class="speaker-block-events-item-date">
                                    <span class="speaker-block-events-item-date-icon">
                                        <?php include "../assets/images/icons/icon-modal-calendar.svg"; ?>
                                    </span>
                                7 сентября, 14:00
                            </div>
                            <div class="speaker-block-events-item-place">
                                    <span class="speaker-block-events-item-place-icon">
                                        <?php include "../assets/images/icons/icon-modal-marker.svg"; ?>
                                    </span>
                                Основной зал 1
                            </div>
                        </div>
                    </a>

                    <a href="#" class="speaker-block-events-item">
                        <div class="speaker-block-events-item-title">
                            Съезд учителей города Москвы
                        </div>

                        <div class="speaker-block-events-item-meta">
                            <div class="speaker-block-events-item-date">
                                    <span class="speaker-block-events-item-date-icon">
                                        <?php include "../assets/images/icons/icon-modal-calendar.svg"; ?>
                                    </span>
                                7 сентября, 14:00
                            </div>
                            <div class="speaker-block-events-item-place">
                                    <span class="speaker-block-events-item-place-icon">
                                        <?php include "../assets/images/icons/icon-modal-marker.svg"; ?>
                                    </span>
                                Основной зал 2
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include "blocks/footer.php"; ?>

<script src="../assets/build/scripts.min.js"></script>
</body>
</html>