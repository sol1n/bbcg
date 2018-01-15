<div id="offcanvas" class="main-offcanvas-overlay">
    <div class="main-offcanvas">
        <div class="main-offcanvas-header">
            <div class="main-offcanvas-logo">
                <img src="/assets/images/logo.svg" alt="B2B Conference Group">
            </div>
            <div class="main-offcanvas-userarea">
                <? if (!$USER->IsAuthorized()): ?>
                    <div class="main-offcanvas-userarea-login-register">
                        <a href="/en/login/" data-side-modal data-side-modal-url="/en/include/blocks/modal-login.php" data-side-modal-class="login-modal">
                            Войти
                        </a>
                        <a href="/en/registration/" data-side-modal data-side-modal-prevent-mobile data-side-modal-url="/en/include/blocks/modal-registration.php" data-side-modal-class="registration-modal" data-side-modal-prevent-overlay-close data-side-modal-prevent-esc-close>
                            Регистрация
                        </a>
                    </div>
                <? endif ?>
            </div>
        </div>
        <div class="main-offcanvas-body">
            <?$APPLICATION->IncludeComponent("bitrix:menu", "main-offcanvas-menu", Array("ROOT_MENU_TYPE" => "top"), false);?>
            <div class="main-offcanvas-padding"></div>
        </div>
        <div class="main-offcanvas-footer">
            <div class="text-center">
                <div class="main-offcanvas-lang">
                    <a href="/" class="main-offcanvas-lang-item">Рус</a>
                    <a href="/en/" class="main-offcanvas-lang-item active">Eng</a>
                </div>
            </div>
        </div>
    </div>
</div>