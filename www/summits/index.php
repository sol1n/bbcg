<?
define('NEED_MAP', true);
define('SUMMIT_TEMPLATE', true);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?> 

<div class="main-heading main-heading-black">
    <div class="wrapper">
        <h1 class="main-heading-title">
            <a href="/summits/">
                Календарь мероприятий
            </a>
        </h1>
    </div>
</div>

<? include($_SERVER['DOCUMENT_ROOT'] . "/include/summits/checkSection.php") ?>

<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "summits-subnav",
    Array(
        "VIEW_MODE" => "TEXT",
        "SHOW_PARENT_NAME" => "Y",
        "IBLOCK_ID" => SUMMITS_IBLOCK,
        "SECTION_ID" => "",
        "SECTION_CODE" => "",
        "SECTION_URL" => "",
        "COUNT_ELEMENTS" => "N",
        "TOP_DEPTH" => "1",
        "SECTION_FIELDS" => "",
        "SECTION_USER_FIELDS" => "",
        "ADD_SECTIONS_CHAIN" => "Y",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "CACHE_NOTES" => "",
        "CACHE_GROUPS" => "N",
        "opened" => $parentSection
    )       
);
?>

<?
    $APPLICATION->IncludeComponent("bitrix:news.list", "summits-page", array(
        "IBLOCK_ID" => SUMMITS_IBLOCK,
        "NEWS_COUNT" => "15",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "FIELD_CODE" => array("ACTIVE_FROM"),
        "PROPERTY_CODE" => array("*"),
        "SET_TITLE" => "N",
        "SET_STATUS_404" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => $parentSection,
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "N",
    ), false);
?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>