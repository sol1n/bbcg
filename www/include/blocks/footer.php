<footer class="main-footer">
    <div class="wrapper">
        <div class="main-footer-logo">
            <img src="/assets/images/logo.svg" alt="BBCG — B2B Conference Group">
        </div>
        <div class="main-footer-address">
            <div class="main-footer-address-icon">
                <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-footer-place.svg') ?>
            </div>
            Москва, Дербеневская наб., <br>
            д. 11, БЦ «Полларс»
        </div>
        <div class="main-footer-phones">
            <div class="main-footer-phones-icon">
                <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-footer-phone.svg') ?>
            </div>
            <a href="tel:+74957852206" onclick="return gtag_report_conversion('tel:+74957852206');"><span class="main-phones">+7 (495) 785-22-06</span></a>, <br>
            <a href="tel:+74957811134" onclick="return gtag_report_conversion('tel:+74957811134');"><span class="main-phones">+7 (495) 781-11-34</span></a>
        </div>
        <div class="main-footer-links">
            <?$APPLICATION->IncludeComponent("bitrix:menu", "main-footer-links", Array("ROOT_MENU_TYPE" => "bottom"), false);?>
        </div>
        <div class="main-footer-socials">
            <a title="Facebook" href="https://www.facebook.com/B2BCG/?ref=site" target="_blank">
                <img src="/assets/images/icons/icon-facebook.svg" alt="Facebook">
            </a>
            <a title="Twitter" href="https://twitter.com/B2BCG" target="_blank">
                <img src="/assets/images/icons/icon-twitter.svg" alt="Twitter">
            </a>
        </div>
        <div class="main-footer-developer">
            Разработка сайта <br>
            <a href="http://300it.ru" title="Разработка сайта - Digital Sparta" target="_blank">Digital Sparta</a>
        </div>
    </div>
</footer>
