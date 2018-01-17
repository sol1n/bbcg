<header class="main-header">
    <div class="wrapper">
        <a href="#" class="main-header-toggler js-offcanvas">
            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-hamburger-menu.svg') ?>
        </a>
        <div class="main-header-logo">
            <a href="/">
                <img src="/assets/images/logo.svg" width="120" alt="BBCG — B2B Conference Group">
            </a>
        </div>
        <div class="main-header-mobile-logo">
            <a href="/">
                <img src="/assets/images/logo-min.svg" alt="BBCG — B2B Conference Group">
            </a>
        </div>
        
        <?$APPLICATION->IncludeComponent("bitrix:menu", "main-header-menu", Array("ROOT_MENU_TYPE" => "top"), false);?>

        <div class="main-header-lang">
            <a href="/" class="main-header-lang-item active">Рус</a>
            <a href="/en/" class="main-header-lang-item">Eng</a>
        </div>

        <? if ($USER->IsAuthorized()): ?>
            <div class="main-header-userarea">
                <div class="main-header-user">
                    <div class="main-header-user-name">
                    <? if (!empty($user['LAST_NAME']) || !empty($user['NAME'])): ?>
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
                    <a href="/login/" data-side-modal data-side-modal-url="/include/blocks/modal-login.php" data-side-modal-class="login-modal">
                        Войти
                    </a>
                    <a href="/registration/" data-side-modal data-side-modal-prevent-mobile data-side-modal-url="/include/blocks/modal-registration.php" data-side-modal-class="registration-modal" data-side-modal-prevent-overlay-close data-side-modal-prevent-esc-close>
                        Регистрация
                    </a>
                </div>
            </div>

            <a href="/login/" data-side-modal data-side-modal-url="/include/blocks/modal-login.php" data-side-modal-class="login-modal" class="main-header-userarea-mobile">
                <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-header-login.svg') ?>
            </a>
        <? endif ?>        
    </div>
</header>