<? $summitCode = $summit['CODE']; ?>
<header class="main-header main-header-with-global">
    <div class="wrapper">
        <a href="#" class="main-header-toggler js-offcanvas">
            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-hamburger-menu.svg'); ?>
        </a>
        <div class="main-header-logo">
            <a href="/<?$APPLICATION->ShowProperty('code')?>/">
                <img src="<?$APPLICATION->ShowProperty('logo')?>" alt="<?$APPLICATION->ShowProperty('name')?>">
            </a>
        </div>
        <div class="main-header-mobile-logo">
            <a href="/<?$APPLICATION->ShowProperty('code')?>/">
                <img src="<?$APPLICATION->ShowProperty('logo')?>" alt="<?$APPLICATION->ShowProperty('name')?>" height="34">
            </a>
        </div>
        <nav class="main-header-menu">
            <ul>
                <? $APPLICATION->IncludeFile('/include/blocks/summit-about-pages.php'); ?>
                <li 
                    <? if (CSite::InDir("/$summitCode/events/")): ?>class="acitve"<? endif ?>
                >
                    <a href="/<?$APPLICATION->ShowProperty('code')?>/events/">Программа</a>
                </li>
                <li
                    <? if (CSite::InDir("/$summitCode/speakers/")): ?>class="acitve"<? endif ?>
                >
                    <a href="/<?$APPLICATION->ShowProperty('code')?>/speakers/">Спикеры</a>
                </li>
                <li
                    <? if (CSite::InDir("/$summitCode/partners/")): ?>class="acitve"<? endif ?>
                >
                    <a href="/<?$APPLICATION->ShowProperty('code')?>/partners/">Партнеры</a>
                </li>
                <li
                    <? if (CSite::InDir("/$summitCode/news/")): ?>class="acitve"<? endif ?>
                >
                    <a href="/<?$APPLICATION->ShowProperty('code')?>/news/">Новости</a>
                </li>
                <li
                    <? if (CSite::InDir("/$summitCode/contacts/")): ?>class="acitve"<? endif ?>
                >
                    <a href="/<?$APPLICATION->ShowProperty('code')?>/contacts/">Контакты</a>
                </li>
            </ul>
        </nav>

        <? if ($USER->IsAuthorized()): ?>
            <div class="main-header-userarea">
                <div class="main-header-user">
                    <div class="main-header-user-name">
                    <? if (isset($user['LAST_NAME']) || isset($user['NAME'])): ?>
                        <?=$user['NAME']?><br><?=$user['LAST_NAME']?>
                    <? else: ?>
                        <?=$user['LOGIN']?>
                    <? endif ?>
                    </div>
                    <div class="main-header-user-toggler"></div>

                    <div class="main-header-user-dropdown-wrapper">
                        <div class="main-header-user-dropdown">
                            <ul class="main-header-user-dropdown-menu">
                                <li>
                                    <a href="/personal/">Мой профиль</a>
                                </li>
                                <li class="main-header-user-dropdown-menu-divider"></li>
                                <li>
                                    <a href="/?logout=yes" onclick="return confirm('Вы действительно хотите выйти?');">Выйти</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-header-userarea-mobile">
                <div class="main-header-user">
                    <div class="main-header-user-photo">
                        <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-header-user.svg"); ?>
                    </div>


                    <div class="main-header-user-dropdown-wrapper">
                        <div class="main-header-user-dropdown">
                            <ul class="main-header-user-dropdown-menu">
                                <li>
                                    <a href="/personal/">Мой профиль</a>
                                </li>
                                <li class="main-header-user-dropdown-menu-divider"></li>
                                <li>
                                    <a href="/?logout=yes" onclick="return confirm('Вы действительно хотите выйти?');">Выйти</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <? else: ?>
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
        <? endif ?>
    </div>
</header>