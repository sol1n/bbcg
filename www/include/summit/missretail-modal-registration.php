<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "missretail-form",
    Array(
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(),
        "IBLOCK_ID" => MISSRETAIL_REQUESTS_IBLOCK,
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "NEWS_COUNT" => "64",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PROPERTY_CODE" => array("*"),
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SORT_BY1" => "NAME",
        "SORT_ORDER1" => "ASC",
        "TITLE" => "Анкета участницы &laquo;Мисс Ритейл 2018&raquo;",
        "USER" => user(),
        "LANG" => "ru",
    )
);?>
