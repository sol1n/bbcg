<?
define('NEED_EVENTS_TABLE', true);
define('SUMMIT_TEMPLATE', true);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>

<main class="main-container main-container-with-header">
    <?
        $APPLICATION->IncludeComponent("bitrix:news.detail", 'summit-event', Array (
            "USE_SHARE" => "N",
            "AJAX_MODE" => "N",
            "IBLOCK_TYPE" => "content",
            "IBLOCK_ID" => SUMMITS_IBLOCK,
            "ELEMENT_ID" => "",
            "ELEMENT_CODE" => $_REQUEST['summit'],
            "CHECK_DATES" => "Y",
            "FIELD_CODE" => Array("ID", "PREVIEW_PICTURE", "DETAIL_PICTURE", "PREVIEW_TEXT", "DATE_CREATE", "CREATED_BY"),
            "PROPERTY_CODE" => Array("*"),
            "SET_TITLE" => "N",
            "SET_CANONICAL_URL" => "N",
            "SET_BROWSER_TITLE" => "N",
            "BROWSER_TITLE" => "NAME",
            "SET_META_KEYWORDS" => "N",
            "META_KEYWORDS" => "-",
            "SET_META_DESCRIPTION" => "N",
            "META_DESCRIPTION" => "-",
            "SET_STATUS_404" => "Y",
            "SET_LAST_MODIFIED" => "N",
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
            "EVENT" => $_REQUEST['id']
        ), false);
    ?>
</main>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>