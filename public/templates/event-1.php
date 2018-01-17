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
<!-- В body ставим классы для изменения цветовой схемы сайта -->
<body class="blue-theme">

<?php include "blocks/header-global.php"; ?>
<?php include "blocks/header-for-event.php"; ?>
<?php include "blocks/offcanvas-event.php"; ?>

<main class="main-container main-container-with-header">
    <?php include "blocks/about-summit-block.php"; ?>
    <?php include "blocks/summit-text-block.php"; ?>
    <?php include "blocks/sessions-block.php"; ?>
    <?php include "blocks/speakers-block-blue.php"; ?>
    <?php include "blocks/partners-block-blue.php"; ?>
    <?php include "blocks/reviews-block.php"; ?>
    <?php include "blocks/news-block-blue.php"; ?>
    <?php include "blocks/summit-price-block.php"; ?>
    <?php include "blocks/summit-registration-block.php"; ?>
    <?php include "blocks/summit-contacts-block.php"; ?>
    <?php include "blocks/location-block.php"; ?>
</main>

<?php include "blocks/footer.php"; ?>

<script src="../assets/build/scripts.min.js"></script>
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU&onload=initMaps"></script>
</body>
</html>