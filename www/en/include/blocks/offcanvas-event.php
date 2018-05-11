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
                        <a href="/en/<?=$summitCode?>/#summit-registration-block" onclick="$('.main-header-toggler').trigger('click')">
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
                <li 
                    <? if (CSite::InDir("/en/$summitCode/events/")): ?>class="acitve"<? endif ?>
                >
                    <a href="/en/<?=$summitCode?>/events/">Program</a>
                </li>
                <li
                    <? if (CSite::InDir("/en/$summitCode/speakers/")): ?>class="acitve"<? endif ?>
                >
                    <a href="/en/<?=$summitCode?>/speakers/">Speakers</a>
                </li>
                <li
                    <? if (CSite::InDir("/en/$summitCode/participants/")): ?>class="acitve"<? endif ?>
                >
                    <a href="/en/<?=$summitCode?>/participants/">Participants</a>
                </li>
                <li
                    <? if (CSite::InDir("/en/$summitCode/partners/")): ?>class="acitve"<? endif ?>
                >
                    <a href="/en/<?=$summitCode?>/partners/">Partners</a>
                </li>
                <li
                    <? if (CSite::InDir("/en/$summitCode/news/")): ?>class="acitve"<? endif ?>
                >
                    <a href="/en/<?=$summitCode?>/news/">News</a>
                </li>
                <li
                    <? if (CSite::InDir("/en/$summitCode/contacts/")): ?>class="acitve"<? endif ?>
                >
                    <a href="/en/<?=$summitCode?>/contacts/">Contacts</a>
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