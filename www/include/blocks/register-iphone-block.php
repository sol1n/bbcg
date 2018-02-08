<section class="register-iphone-block">
    <div class="wrapper">
        <div class="register-iphone-block-left">
            <div class="register-iphone-block-title">
                Зарегистрируйтесь на сайте BBCG
            </div>
            <div class="register-iphone-block-subtitle">
                Регистрация дает доступ к эксклюзивным новостям
                и презентациям, возможность задать вопрос спикеру,
                а также скидки на участие в саммитах
            </div>
            <? if (! $USER->IsAuthorized()): ?>
                <div class="register-iphone-block-button">
                    <a href="/registration/" data-side-modal data-side-modal-prevent-mobile data-side-modal-url="/include/blocks/modal-registration.php" data-side-modal-class="registration-modal" data-side-modal-prevent-overlay-close data-side-modal-prevent-esc-close class="button button-light-burgundy">
                        Регистрация
                    </a>
                </div>
            <? endif ?>
        </div>
        <div class="register-iphone-block-right">
            <div class="register-iphone-block-screen"></div>
            <div class="register-iphone-block-app">
                <div class="register-iphone-block-app-title">
                    Приложение <br>
                    BBCG
                </div>
                <a href="https://itunes.apple.com/us/app/bbcg/id691970503" target="_blank" class="register-iphone-block-app-icon">
                    <img src="/assets/images/icons/icon-appstore-white.svg" alt="App Store">
                </a>
                <br>
                <a href="https://play.google.com/store/apps/details?id=com.konferenza.bbcg" target="_blank" class="register-iphone-block-app-icon">
                    <img src="/assets/images/icons/icon-google-play-white.svg" alt="Google Play">
                </a>
            </div>
        </div>
    </div>
</section>