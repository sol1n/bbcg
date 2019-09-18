<?
    use \Bitrix\Main\Localization\Loc;

    if ($arResult['DETAIL_PICTURE']) {
        $background = $arResult['DETAIL_PICTURE']['SRC'];
    } else {
        $background = '/assets/images/tmp/events/about-summit-bg.jpg';
    }
?>

<?
$section_class = '';
if(!empty($arResult['PROPERTIES']['BACKGROUND_VIDEO']['VALUE'])):?>
    <?$section_class = 'hidden-on-desktop';?>
    <section id="video-banner">
          <video preload="auto" playsinline autoplay muted loop id="video-background">
              <source src="/upload/documents/video/<?=$arResult['PROPERTIES']['BACKGROUND_VIDEO']['VALUE']?>" type="video/mp4">
          </video>
    </section>
<?endif;?>

<section class="about-summit-block <?=$section_class;?>" style="background-image: url('<?=$background?>')">
    <div class="wrapper">
        <div class="about-summit-block-content">
            <h1 class="about-summit-block-title">
                <?=$arResult['NAME']?>
            </h1>
            <div class="about-summit-block-date">
                <?=$arResult['DURATION']?>
            </div>
            <br />
            <div class="about-summit-block-date">
                <?=$arResult['PROPERTIES']['ADDRESS']['VALUE']?>
            </div>
            <div class="about-summit-block-desc">
                <?=$arResult['PREVIEW_TEXT']?>
            </div>
            <div class="about-summit-block-button">
                <?
                    $now_date = date('d.m.Y');
                    $end_date = $arResult["PROPERTIES"]["END"]["VALUE"];
                ?>
                <? if(strtotime($now_date) < strtotime($end_date)): ?>
                    <a href="#summit-registration-block" class="button button-<?=$arResult['PROPERTIES']['COLOR']['VALUE']?> js-smooth-scroll">
                        <?=Loc::GetMessage('REGISTRATION', [], $arParams['LANG'])?>
                    </a>
                <? endif; ?>
            </div>
        </div>
    </div>
</section>
