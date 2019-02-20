<?
    use \Bitrix\Main\Localization\Loc;

    $title_add_padding = "";
    if(strtotime($now_date) >= strtotime($end_date))//variables from about-summit-block.php(summit news.detail)
        $title_add_padding = "p-t-xxl";
?>

<? if ($arResult["ITEMS"]): ?>
        <div id="sticky_item" class="wrapper partners-contacts">
            <h3 class="summit-contacts-block-title <?=$title_add_padding;?>">
                <?=Loc::GetMessage('CONTACTS', [], $arParams['LANG'])?>
            </h3>

            <div class="row summit-contacts-blocks">
                <? foreach ($arResult["ITEMS"] as $item): ?>
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="summit-contacts-block-card">
                            <div class="summit-contacts-block-card-title">
                                <?=$item['NAME']?>
                            </div>
                            <div class="summit-contacts-block-card-desc">
                                <?=$item['PREVIEW_TEXT']?>
                            </div>
                            <div class="summit-contacts-block-card-manager">
                                <div class="summit-contacts-block-card-manager-photo">
                                    <? $img = CFile::ResizeImageGet($item['PREVIEW_PICTURE']['ID'], ['width' => 96*2, 'height' => 96*2], BX_RESIZE_IMAGE_EXACT); ?>
                                    <img src="<?=$img['src']?>" alt="<?=$item['PROPERTIES']['FIO']['VALUE']?>">
                                </div>
                                <div class="summit-contacts-block-card-manager-name">
                                    <?=$item['PROPERTIES']['FIO']['VALUE']?>
                                </div>
                                <div class="summit-contacts-block-card-manager-contacts">
                                    <?=$item['PROPERTIES']['CONTACTS']['~VALUE']['TEXT']?>
                                </div>
                            </div>
                        </div>
                    </div>
                <? endforeach ?>
            </div>

            <? if (!$arParams['HIDE_APPS']): ?>
                <div class="text-center m-t-xl">
                    <div class="partners-app">
                        <div class="download-app-block-title">
                            <?=Loc::GetMessage('DOWNLOAD_APP', [], $arParams['LANG'])?> «<?=$arParams['NAME']?>»
                        </div>
                        <div class="download-app-block-links">
                            <a href="<?=$arResult['IOS_APP_LINK']?>" target="_blank">
                                <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-appstore-white.svg"); ?>
                            </a>
                            <a href="<?=$arResult['ANDROID_APP_LINK']?>" target="_blank">
                                <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-google-play-white.svg"); ?>
                            </a>
                        </div>
                    </div>
                </div>
            <? endif ?>
        </div>
<? endif ?>
