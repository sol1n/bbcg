<header class="main-header">
    <div class="wrapper">
        <a href="#" class="main-header-toggler js-offcanvas">
            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-hamburger-menu.svg') ?>
        </a>
        <div class="main-header-logo">
            <a href="/">
                <img src="/assets/images/logo.svg" alt="BBCG — B2B Conference Group">
            </a>
        </div>
        <div class="main-header-mobile-logo">
            <a href="/">
                <img src="/assets/images/logo-min.svg" alt="BBCG — B2B Conference Group">
            </a>
        </div>
        
        <?$APPLICATION->IncludeComponent("bitrix:menu", "main-header-menu", Array("ROOT_MENU_TYPE" => "top"), false);?>

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
            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-header-login.svg') ?>
        </a>
    </div>
</header>