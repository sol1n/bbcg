<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>

<? $APPLICATION->IncludeFile('/include/academy/promo-block.php'); ?>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "cources-page",
    Array(
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(),
        "IBLOCK_ID" => COURCES_IBLOCK,
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "NEWS_COUNT" => "16",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "PARENT_SECTION" => "28",
        "PARENT_SECTION_CODE" => "",
        "PROPERTY_CODE" => array("*"),
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SORT_BY1" => "PROPERTY_BEGIN",
        "SORT_ORDER1" => "ASC",
        "TITLE" => "Программы обучения",
        "SUBTITLE" => "Образовательные программы для топ менеджеров ритейла",
        "DESCRIPTION" => "Вы можете скачать <a target=\"_blank\" href=\"/upload/retail-academy-cources-2018.pdf\">список программ на 2018 год</a> в формате pdf"
    )
);?>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "cources-page",
    Array(
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(),
        "IBLOCK_ID" => COURCES_IBLOCK,
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "NEWS_COUNT" => "16",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "PARENT_SECTION" => "29",
        "PARENT_SECTION_CODE" => "",
        "PROPERTY_CODE" => array("*"),
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SORT_BY1" => "PROPERTY_BEGIN",
        "SORT_ORDER1" => "ASC",
        "TITLE" => "Бакалавриат и Магистратура",
        "SUBTITLE" => ""
    )
);?>
<? $APPLICATION->IncludeFile('/include/academy/speakers-academy-block.php'); ?>
<? $APPLICATION->IncludeFile('/include/academy/news-block.php'); ?>
<? $APPLICATION->IncludeFile('/include/academy/registration-block.php'); ?>
<? $APPLICATION->IncludeFile('/include/academy/contacts-block.php'); ?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
