<div class="header-global">
    <div class="wrapper">
        <a href="/en/" class="header-global-logo">
            <img src="/assets/images/logo.svg" alt="BBCG">
        </a>

        <?$APPLICATION->IncludeComponent("bitrix:menu", "header-global-menu", Array("ROOT_MENU_TYPE" => "top"), false);?>

        <div class="header-global-lang">
            <a href="<?=localizeUrl($_SERVER['REQUEST_URI'], 'ru'); ?>" class="header-global-lang-item">Рус</a>
            <a href="<?=localizeUrl($_SERVER['REQUEST_URI'], 'en'); ?>" class="header-global-lang-item active">Eng</a>
        </div>
    </div>
</div>