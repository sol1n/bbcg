<?
    use \Bitrix\Main\Localization\Loc;

    if ($arResult['DETAIL_PICTURE']) {
        $background = $arResult['DETAIL_PICTURE']['SRC'];
    } else {
        $background = '/assets/images/tmp/events/about-summit-bg.jpg';
    }

    $now_date = date('d.m.Y');
    $end_date = $arResult["PROPERTIES"]["END"]["VALUE"];
?>

<?
$section_class = '';
if(!empty($arResult['PROPERTIES']['BACKGROUND_VIDEO']['VALUE'])):?>
    <?$section_class = 'hidden-on-desktop';?>
    <section id="video-banner">
          <video preload="auto" playsinline autoplay muted loop id="video-background">
              <source src="/upload/documents/video/<?=$arResult['PROPERTIES']['BACKGROUND_VIDEO']['VALUE']?>" type="video/mp4">
          </video>
          <div class="wrapper">
              <div class="about-summit-block-button">
                  <? if(strtotime($now_date) < strtotime($end_date)): ?>
                      <a href="#summit-registration-block" class="button button-<?=$arResult['PROPERTIES']['COLOR']['VALUE']?>-invert js-smooth-scroll">
                          <?=Loc::GetMessage('REGISTRATION', [], $arParams['LANG'])?>
                      </a>
                  <? endif; ?>
                  <? if(!empty($arResult['PROPERTIES']['BROADCAST_LINK']['VALUE'])): ?>
                        <a href="#broadcast-block" class="button button-<?=$arResult['PROPERTIES']['COLOR']['VALUE']?>-invert js-smooth-scroll">
                            <?=Loc::GetMessage('GO_TO_BROADCAST', [], $arParams['LANG'])?>
                        </a>
                  <? endif; ?>
              </div>
          </div>
    </section>
<?endif;?>

<section class="about-summit-block <?=$section_class;?>" style="background-image: url('<?=$background?>')">
    <div class="wrapper">
        <?
        $promoblock_class = '';
        $reg_button_title = 'REGISTRATION';
        if($arResult['PROPERTIES']['ALT_PROMO']['VALUE'] == "Y") {
            $promoblock_class = 'about-summit-block-content-alternative';
            //$reg_button_title = 'ALT_BECOME_SPEAKER';
        }
        ?>
        <div class="about-summit-block-content <?=$promoblock_class;?>">
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
                <? if($arResult['PROPERTIES']['ALT_PROMO']['VALUE'] == "Y"): ?>
                    <? if (is_null($user) or !isset($user['UF_SUBSCRIBE']) or ($user['UF_SUBSCRIBE'] != 1)): ?>
                        <? if (is_null($user)): ?>
                            <a href="#subscribe" class="button button-red" data-side-modal data-side-modal-url="/include/subscribe/anonymous.php" data-side-modal-class="registration-modal">
                                <?=Loc::GetMessage('SUBSCRIBE', [], $arParams['LANG'])?>
                            </a>
                        <? else: ?>
                            <a href="#subscribe" class="button button-red" data-side-modal data-side-modal-url="/include/subscribe/user.php" data-side-modal-class="registration-modal">
                                <?=Loc::GetMessage('SUBSCRIBE', [], $arParams['LANG'])?>
                            </a>
                        <? endif ?>
                    <? endif ?>
                <? endif ?>
                <? if(strtotime($now_date) < strtotime($end_date)): ?>
                    <a href="#summit-registration-block" class="button button-<?=$arResult['PROPERTIES']['COLOR']['VALUE']?> js-smooth-scroll">
                        <?=Loc::GetMessage($reg_button_title, [], $arParams['LANG'])?>
                    </a>
                <? endif; ?>
            </div>
        </div>
    </div>
</section>
