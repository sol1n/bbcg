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

<?php include "blocks/header-with-user.php"; ?>
<?php include "blocks/offcanvas.php"; ?>

<main class="main-container main-container-with-header">
    <div class="main-heading main-heading-ink">
        <div class="wrapper">
            <h1 class="main-heading-title">
                <a href="#">
                    Личный кабинет
                </a>
            </h1>
        </div>
    </div>

    <nav class="subnav">
        <div class="wrapper">
            <ul class="subnav-list">
                <li class="subnav-list-item active">
                    <a href="cabinet-profile.php" class="subnav-link">
                        <span>Мои данные</span>
                    </a>
                </li>
                <li class="subnav-list-item">
                    <a href="cabinet-password.php" class="subnav-link">
                        <span>Безопасность</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="cabinet-block">
        <div class="wrapper">
            <div class="cabinet-block-profile-wrapper">
                <div class="cabinet-block-heading">
                    <div class="cabinet-block-title">
                        Профиль
                    </div>
                </div>

                <div class="cabinet-block-profile-title">
                    Андреас Шляйхер
                </div>

                <div class="cabinet-block-profile-subtitle">
                    Руководитель Директората по образованию и компетенциям  Организации экономики
                </div>

                <div class="cabinet-block-profile-table-title">
                    Личные данные
                </div>

                <div class="overflow-auto">
                    <table class="cabinet-block-profile-table">
                        <tr>
                            <th>Телефон</th>
                            <td>+7 (999) 999-99-99</td>
                        </tr>
                        <tr>
                            <th>Пол</th>
                            <td>Мужской</td>
                        </tr>
                        <tr>
                            <th>Дата рождения</th>
                            <td>06 сентябрь 1970</td>
                        </tr>
                        <tr>
                            <th>Регион</th>
                            <td>Новосибирская область</td>
                        </tr>
                        <tr>
                            <th>Город</th>
                            <td>Новосибирск</td>
                        </tr>
                    </table>
                </div>

                <div class="cabinet-block-profile-table-title">
                    Организация
                </div>

                <div class="overflow-auto">
                    <table class="cabinet-block-profile-table">
                        <tr>
                            <th>Организация</th>
                            <td>Pisa Company</td>
                        </tr>
                        <tr>
                            <th>Сфера деятельности</th>
                            <td>Образовательные программы</td>
                        </tr>
                    </table>
                </div>

                <a href="cabinet-profile-edit.php" class="button button-light-burgundy">
                    Редактировать
                </a>
            </div>
        </div>
    </div>
</main>

<script src="../assets/build/scripts.min.js"></script>
</body>
</html>