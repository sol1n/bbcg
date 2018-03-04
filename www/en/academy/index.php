<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>

<? $APPLICATION->IncludeFile('/en/include/academy/promo-block.php'); ?>
<? $APPLICATION->IncludeComponent(
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
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PROPERTY_CODE" => array("*"),
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SORT_BY1" => "PROPERTY_BEGIN",
        "SORT_ORDER1" => "ASC",
        "TITLE" => "Learning programs",
        "SUBTITLE" => "Educational programs for top retail managers",
        "DESCRIPTION" => "You can download <a target=\"_blank\" href=\"/upload/retail-academy-cources-2018.pdf\">the list of programs for 2018</a> in pdf format",
        "LANG" => "en"
    )
);?>
<? $APPLICATION->IncludeFile('/en/include/academy/speakers-academy-block.php'); ?>
<? $APPLICATION->IncludeFile('/en/include/academy/news-block.php'); ?>
<? $APPLICATION->IncludeFile('/en/include/academy/registration-block.php'); ?>
<? $APPLICATION->IncludeFile('/en/include/academy/contacts-block.php'); ?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
