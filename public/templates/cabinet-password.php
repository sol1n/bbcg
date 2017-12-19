<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>BBCG — B2B Conference group</title>
    <link rel="stylesheet" href="/assets/build/style.min.css">
    <meta name="theme-color" content="#1b1b1b">
</head>
<body>

<?php include "blocks/header.php"; ?>
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
                <li class="subnav-list-item">
                    <a href="cabinet-profile.php" class="subnav-link">
                        <span>Мои данные</span>
                    </a>
                </li>
                <li class="subnav-list-item active">
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
                        Безопасность
                    </div>
                </div>

                <form action="cabinet-profile.php" method="POST">
                    <div class="form-group">
                        <label for="cabinet-current-password" class="form-label">
                            Текущий пароль
                        </label>
                        <input id="cabinet-current-password" type="password" class="form-input" name="current_password" required>
                    </div>

                    <div class="form-group">
                        <label for="cabinet-new-password" class="form-label">
                            Новый пароль
                        </label>
                        <input id="cabinet-new-password" type="password" class="form-input" name="new_password" required>
                    </div>

                    <div class="form-group">
                        <label for="cabinet-new-password-2" class="form-label">
                            Подтвердите новый пароль
                        </label>
                        <input id="cabinet-new-password-2" type="password" class="form-input" name="new_password2" required>
                    </div>

                    <button type="submit" class="button button-light-burgundy">
                        Сохранить
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="/assets/build/scripts.min.js"></script>
</body>
</html>