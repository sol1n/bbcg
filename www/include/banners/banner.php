<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

CModule::IncludeModule("iblock");

$arBanners = array();
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PICTURE", "ACTIVE", "PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>HORIZONTAL_BANNERS_IBLOCK, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("ID"=>"DESC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
if($ob = $res->GetNextElement()){
    $arBanners["FIELDS"] = $ob->GetFields();
    $arBanners["PROPERTIES"] = $ob->GetProperties();
}

if(!empty($arBanners)):
    $button_text = $arBanners["PROPERTIES"]["BUTTON_TEXT"]["VALUE"];
    $button_color = $arBanners["PROPERTIES"]["BUTTON_COLOR"]["VALUE"];
    $button_color = empty($button_color) ? "light-burgundy" : $button_color;
    $link = $arBanners["PROPERTIES"]["LINK"]["VALUE"];
    $link = empty($link) ? "#" : $link;
    $img_small = CFile::ResizeImageGet($arBanners["FIELDS"]['PREVIEW_PICTURE'], ['width' => 195*2, 'height' => 133*2], BX_RESIZE_IMAGE_EXACT);
    $img_big = CFile::ResizeImageGet($arBanners["FIELDS"]['DETAIL_PICTURE'], ['width' => 779*2, 'height' => 110*2], BX_RESIZE_IMAGE_EXACT);
?>

<div class="horizontal-banner banner">
    <a class="banner-close"></a>
    <div class="wrapper">
        <div class="row">
            <div class="col-md-2 col-sm-2 banner-left">
                <?php if(!empty($img_small)): ?>
                    <a href="<?=$link;?>" target="_blank">
                        <img src="<?=$img_small['src'];?>"/>
                    </a>
                <?php endif;?>
            </div>
            <div class="col-md-8 col-sm-8 banner-center">
                <?php if(!empty($img_big)): ?>
                    <img src="<?=$img_big['src'];?>"/>
                <?php endif;?>
            </div>
            <div class="col-md-2 col-sm-2 banner-right">
                <?php if(!empty($button_text)): ?>
                    <a class="banner-button button button-<?=$button_color;?>" href="<?=$link;?>" target="_blank"><?=$button_text;?></a>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<?php endif;?>
