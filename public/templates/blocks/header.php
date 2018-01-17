<header class="main-header">
    <div class="wrapper">
        <a href="#" class="main-header-toggler js-offcanvas">
            <?php include "../assets/images/icons/icon-hamburger-menu.svg"; ?>
        </a>
        <div class="main-header-logo">
            <a href="index.php">
                <img src="../assets/images/logo.svg" width="120" alt="BBCG — B2B Conference Group">
            </a>
        </div>
        <div class="main-header-mobile-logo">
            <a href="index.php">
                <img src="../assets/images/logo-min.svg" alt="BBCG — B2B Conference Group">
            </a>
        </div>
        <nav class="main-header-menu">
            <ul>
                <li class="active">
                    <a href="#">О компании</a>
                </li>
                <li>
                    <a href="#">Календарь саммитов</a>
                </li>
                <li>
                    <a href="#">Академия ретейла</a>
                </li>
                <li>
                    <a href="news.php">Новости</a>
                </li>
                <li>
                    <a href="contacts.php">Контакты</a>
                </li>
            </ul>
        </nav>

        <div class="main-header-lang">
            <a href="#" class="main-header-lang-item active">Рус</a>
            <a href="#" class="main-header-lang-item">Eng</a>
        </div>

        <div class="main-header-userarea">
            <div class="main-header-userarea-login-register">
                <a href="login.php" data-side-modal data-side-modal-url="blocks/modal-login.php" data-side-modal-class="login-modal">
                    Войти
                </a>
                <a href="registration.php" data-side-modal data-side-modal-prevent-mobile data-side-modal-url="blocks/modal-registration.php" data-side-modal-class="registration-modal" data-side-modal-prevent-overlay-close data-side-modal-prevent-esc-close>
                    Регистрация
                </a>
            </div>
        </div>

        <a href="#" class="main-header-userarea-mobile">
            <?php include "../assets/images/icons/icon-header-login.svg"; ?>
        </a>
    </div>
</header>