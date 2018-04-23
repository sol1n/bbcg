<section class="subscribe-block subscribe-block-downarrow">
    <div class="wrapper">
        <div class="subscribe-block-header">
            <h3 class="subscribe-block-title">Подписка на рассылку</h3>
            <div class="subscribe-block-subtitle">
                Узнайте эксклюзивную информацию о рынке до появления в СМИ
            </div>
        </div>
        <div class="subscribe-block-form">
            <? if (is_null($user)): ?>
                <div class="subscribe-block-button">
                    <a href="#subscribe" class="button button-red" data-side-modal data-side-modal-url="/include/subscribe/anonymous.php" data-side-modal-class="registration-modal">
                        Подписаться
                    </a>
                </div>
            <? else: ?>
                <div class="subscribe-block-button">
                    <a href="#subscribe" class="button button-red" data-side-modal data-side-modal-url="/include/subscribe/user.php" data-side-modal-class="registration-modal">
                        Подписаться
                    </a>
                </div>
            <? endif ?>
        </div>
    </div>
</section>