<section class="about-block about-block-downarrow">
    <div class="wrapper">
        <div class="about-block-left">
            <h1 class="about-block-title">
                B2B Conference Group
            </h1>
            <div class="about-block-stats">
                <div class="about-block-stats-item">
                    <div class="about-block-stats-item-value">
                        19
                    </div>
                    <div class="about-block-stats-item-desc">
                        лет <br>
                        работы
                    </div>
                </div>

                <div class="about-block-stats-item">
                    <div class="about-block-stats-item-value">
                        300
                    </div>
                    <div class="about-block-stats-item-desc">
                        топ спикеров
                    </div>
                </div>

                <div class="about-block-stats-item">
                    <div class="about-block-stats-item-value">
                        100
                    </div>
                    <div class="about-block-stats-item-desc">
                        компаний партнеров
                    </div>
                </div>
            </div>

            <div class="about-block-desc">
                Здесь в Академии Ритейла и в кругу делегатов BBCG крупнейший в отрасли центр новых знаний и видения перспективы. Более 30 специализированных конференций и образовательных сессий в год. Опыт на острие мировой и российской практики!
            </div>

            <? if (! $USER->IsAuthorized()): ?>
                <div class="about-block-button">
                    <a href="registration.php" data-side-modal data-side-modal-prevent-mobile data-side-modal-url="/include/blocks/modal-registration.php" data-side-modal-class="registration-modal" data-side-modal-prevent-overlay-close data-side-modal-prevent-esc-close class="button button-light-burgundy">
                        Регистрация на сайте
                    </a>

                    <div class="about-block-button-desc">
                        Эксклюзивная информация и полезные контакты в сфере ритейла.
                    </div>
                </div>
            <? endif ?>
        </div>
        <div class="about-block-right">
            <div class="about-block-seo">
                <div class="about-block-seo-bubble">
                    <div class="about-block-seo-bubble-title">
                        Ритейл в России вступает в фазу нового роста!
                    </div>
                    <div class="about-block-seo-bubble-text">
                        <p>
                            Нового во всех отношениях: иные темпы, новые бизнес-модели, новые технологии, новые принципы управления. С гигантским отрывом лидируют в скорости роста цифровые платформы, уже сегодня превращая  привычный ландшафт рынка в 'new retail'.
                        </p>
                        <p>
                            Расти в новой экономике, тем более опережать рынок, можно только непрерывно получая новые знания.<br/>
                            И это наша работа &mdash; BBCG и Академии Ритейла &mdash; предоставлять их вам. В привычных и<br/>
                            совершенно новых форматах!
                        </p>
                        <p>
                            Главное &mdash; мы задаем правильные<br/>
                            вопросы правильным людям! :)
                        </p>
                        <p>
                            Добро пожаловать,<br/>
                            двери в новый ритейл открыты!
                        </p>
                    </div>
                </div>
            </div>

            <div class="about-block-seo-photo"></div>

            <? if (! $USER->IsAuthorized()): ?>
                <div class="about-block-seo-button">
                    <a href="/registration/" data-side-modal data-side-modal-prevent-mobile data-side-modal-url="/include/blocks/modal-registration.php" data-side-modal-class="registration-modal" data-side-modal-prevent-overlay-close data-side-modal-prevent-esc-close class="button button-light-burgundy">Регистрация</a>

                    <div class="about-block-seo-button-desc">
                        Эксклюзивная информация и полезные контакты в сфере ритейла.
                    </div>
                </div>
            <? endif ?>

            <div class="about-block-seo-desc">
                <div class="about-block-seo-desc-name">
                    Алексей Филатов
                </div>
                <div class="about-block-seo-desc-title">
                    Управляющий директор <br>
                    «B2B Conference Group»
                </div>
            </div>
        </div>
    </div>
</section>
