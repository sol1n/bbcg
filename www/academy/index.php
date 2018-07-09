<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>

<? $APPLICATION->IncludeFile('/include/academy/promo-block.php'); ?>

<section id="academy-program" class="programs-block p-b-xl">

    <?$APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list", 
        "academy-program",
        Array(
            "VIEW_MODE" => "TEXT",
            "SHOW_PARENT_NAME" => "N",
            "IBLOCK_TYPE" => "retail",
            "IBLOCK_ID" => COURCES_IBLOCK,
            "SECTION_ID" => "",
            "SECTION_CODE" => "",
            "SECTION_URL" => "",
            "COUNT_ELEMENTS" => "N",
            "TOP_DEPTH" => "1",
            "SECTION_FIELDS" => "",
            "SECTION_USER_FIELDS" => "",
            "ADD_SECTIONS_CHAIN" => "N",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "360000",
            "CACHE_NOTES" => "",
            "CACHE_GROUPS" => "Y",
            "LANG" => 'ru'
        )       
    );?>

    <div class="programs-block-description">
        Вы можете скачать <a target="_blank" href="/upload/retail-academy-cources-2018.pdf">список программ на 2018 год</a> в формате pdf            
    </div>

</section>

<? $APPLICATION->IncludeFile('/include/academy/speakers-academy-block.php'); ?>
<? $APPLICATION->IncludeFile('/include/academy/news-block.php'); ?>
<? $APPLICATION->IncludeFile('/include/academy/registration-block.php'); ?>
<? $APPLICATION->IncludeFile('/include/academy/contacts-block.php'); ?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>

