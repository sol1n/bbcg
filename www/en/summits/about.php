<?
define('NEED_MAP', true);
define('SUMMIT_TEMPLATE', true);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

include "redirect.php";
?>

<?
    $APPLICATION->IncludeComponent("bitrix:news.detail", 'summit-about', Array (
        "USE_SHARE" => "N",
        "AJAX_MODE" => "N",
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => SUMMITS_IBLOCK,
        "ELEMENT_ID" => "",
        "ELEMENT_CODE" => $_REQUEST['summit'],
        "CHECK_DATES" => "Y",
        "FIELD_CODE" => Array("ID", "PREVIEW_PICTURE", "DETAIL_PICTURE", "PREVIEW_TEXT", "DATE_CREATE", "CREATED_BY"),
        "PROPERTY_CODE" => Array("*"),
        "SET_TITLE" => "Y",
        "SET_CANONICAL_URL" => "Y",
        "SET_BROWSER_TITLE" => "Y",
        "BROWSER_TITLE" => "NAME",
        "SET_META_KEYWORDS" => "Y",
        "META_KEYWORDS" => "-",
        "SET_META_DESCRIPTION" => "Y",
        "META_DESCRIPTION" => "-",
        "SET_STATUS_404" => "Y",
        "SET_LAST_MODIFIED" => "Y",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "Y",
        "ADD_ELEMENT_CHAIN" => "Y",
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "USE_PERMISSIONS" => "N",
        "GROUP_PERMISSIONS" => Array(),
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "360",
        "CACHE_GROUPS" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y",
        "PAGE_CODE" => "about",
        "LANG" => "en"
    ), false);
?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
