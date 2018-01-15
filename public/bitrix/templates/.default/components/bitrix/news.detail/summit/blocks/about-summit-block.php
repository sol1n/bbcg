<?
    if ($arResult['DETAIL_PICTURE']) {
        $background = $arResult['DETAIL_PICTURE']['SRC'];
    } else {
        $background = '/assets/images/tmp/events/about-summit-bg.jpg';
    }
?>
<section class="about-summit-block" style="background-image: url('<?=$background?>')">
    <div class="wrapper">
        <div class="about-summit-block-content">
            <div class="about-summit-block-title">
                <?=$arResult['NAME']?>
            </div>
            <div class="about-summit-block-date">
                <?=$arResult['DURATION']?>
            </div>
            <div class="about-summit-block-desc">
                <?=$arResult['PREVIEW_TEXT']?>
            </div>
            <div class="about-summit-block-button">
                <a href="#summit-registration-block" class="button button-blue js-smooth-scroll">
                    Регистрация
                </a>
            </div>
        </div>
    </div>
</section>