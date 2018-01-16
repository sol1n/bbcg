<div id="offcanvas" class="main-offcanvas-overlay">
    <div class="main-offcanvas">
        <div class="main-offcanvas-header">
            <div class="main-offcanvas-logo">
                <a href="/en/">
                    <img src="/assets/images/logo.svg" alt="BBCG — B2B Conference Group">
                </a>
            </div>
            <div class="main-offcanvas-userarea">
                <? if (!$USER->IsAuthorized()): ?>
                    <div class="main-offcanvas-userarea-login-register">
                        <a href="/en/login/" data-side-modal data-side-modal-url="/en/include/blocks/modal-login.php" data-side-modal-class="login-modal">
                            Login
                        </a>
                        <a href="/en/registration/" data-side-modal data-side-modal-prevent-mobile data-side-modal-url="/en/include/blocks/modal-registration.php" data-side-modal-class="registration-modal" data-side-modal-prevent-overlay-close data-side-modal-prevent-esc-close>
                            Registration
                        </a>
                    </div>
                <? endif ?>
            </div>
        </div>
        <div class="main-offcanvas-body">
            <div class="main-offcanvas-event-logo">
                <div class="main-offcanvas-padding">
                    <img src="<?$APPLICATION->ShowProperty('logo')?>" alt="<?$APPLICATION->ShowProperty('name')?>">
                </div>
            </div>
            <ul class="main-offcanvas-menu">
                <? $APPLICATION->IncludeFile('/en/include/blocks/summit-about-pages.php'); ?>
                <li>
                    <a href="/en/summits/">
                        Summit calendar
                    </a>
                </li>
                <li>
                    <a href="/en/academy/">
                        Academy of Retail
                    </a>
                </li>
                <li>
                    <a href="/en/news/">
                        News
                    </a>
                </li>
                <li>
                    <a href="/en/contacts/">
                        Contacts
                    </a>
                </li>
            </ul>

            <div class="main-offcanvas-padding">

            </div>
        </div>
        <div class="main-offcanvas-footer">
            <div class="text-center">
                <div class="main-offcanvas-lang">
                    <a href="/" class="main-offcanvas-lang-item active">Рус</a>
                    <a href="/en/" class="main-offcanvas-lang-item">Eng</a>
                </div>
            </div>
        </div>
    </div>
</div>