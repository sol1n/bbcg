<header class="main-header main-header-with-global">
    <div class="wrapper">
        <a href="#" class="main-header-toggler js-offcanvas">
            <?php include "../assets/images/icons/icon-hamburger-menu.svg"; ?>
        </a>
        <div class="main-header-logo">
            <a href="index.php">
                <img src="../assets/images/summits-logo/online-retail-russia-label.svg" alt="Бизнес форум «Online Retail Russia»">
            </a>
        </div>
        <div class="main-header-mobile-logo">
            <a href="index.php">
                <img src="../assets/images/logo-online-retail-russia.png" alt="Бизнес форум «Online Retail Russia»" height="34">
            </a>
        </div>
        <nav class="main-header-menu">
            <ul>
                <li class="parent">
                    <a href="#">О саммите</a>

                    <div class="main-header-submenu">
                        <div class="wrapper">
                            <ul>
                                <li>
                                    <a href="#">Посетителям</a>
                                </li>
                                <li>
                                    <a href="#">Экспонентам</a>
                                </li>
                                <li>
                                    <a href="#">Партнерам</a>
                                </li>
                                <li>
                                    <a href="#">СМИ</a>
                                </li>
                                <li>
                                    <a href="#">Полезная информация</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#">Программа</a>
                </li>
                <li>
                    <a href="#">Спикеры</a>
                </li>
                <li>
                    <a href="#">Партнеры</a>
                </li>
                <li>
                    <a href="#">Новости</a>
                </li>
                <li>
                    <a href="#">Контакты</a>
                </li>
            </ul>
        </nav>

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

        <div class="main-header-userarea-mobile">
            <div class="main-header-user">
                <div class="main-header-user-photo">
                    <?php include "../assets/images/icons/icon-header-user.svg"; ?>
                </div>


                <div class="main-header-user-dropdown-wrapper">
                    <div class="main-header-user-dropdown">
                        <ul class="main-header-user-dropdown-menu">
                            <li>
                                <a href="cabinet-profile.php">Мой профиль</a>
                            </li>
                            <li class="main-header-user-dropdown-menu-divider"></li>
                            <li>
                                <a href="index.php" onclick="return confirm('Вы действительно хотите выйти?');">Выйти</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>