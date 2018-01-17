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
                <li>
                    <a href="#">О компании</a>
                </li>
                <li class="parent">
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
            <div class="main-header-user">
                <!--<div class="main-header-user-photo">
                    <img src="/assets/images/tmp/speakers/andreas-shlyayher.jpg" alt="">
                </div>-->
                <div class="main-header-user-name">
                    Alexey <br>
                    Shlyayher
                </div>
                <div class="main-header-user-toggler"></div>

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