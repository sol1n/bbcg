<section class="subscribe-block subscribe-block-downarrow">
    <div class="wrapper">
        <div class="subscribe-block-header">
            <h3 class="subscribe-block-title">Subscribe to newsletter</h3>
            <div class="subscribe-block-subtitle">
                Learn exclusive information about the market before appearing in the media
            </div>
        </div>
        <div class="subscribe-block-form">
            <? if (is_null($user)): ?>
                <div class="subscribe-block-button">
                    <a href="#subscribe" class="button button-red" data-side-modal data-side-modal-url="/en/include/subscribe/anonymous.php" data-side-modal-class="registration-modal">
                        Subscribe
                    </a>
                </div>
            <? else: ?>
                <div class="subscribe-block-button">
                    <a href="#subscribe" class="button button-red" data-side-modal data-side-modal-url="/en/include/subscribe/user.php" data-side-modal-class="registration-modal">
                        Subscribe
                    </a>
                </div>
            <? endif ?>
        </div>
    </div>
</section>