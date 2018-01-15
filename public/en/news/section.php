<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?> 

<div class="main-heading main-heading-black">
    <div class="wrapper">
        <h1 class="main-heading-title">
            <a href="/en/news/">
                News
            </a>
        </h1>

        <form method="POST" class="main-heading-search-form">
            <input type="search" name="search" class="main-heading-search-input" placeholder="Search">
            <input type="submit" value="" class="main-heading-search-submit">
        </form>
    </div>
</div>

<? include($_SERVER['DOCUMENT_ROOT'] . "/en/include/news/search.php") ?>

<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "news-subnav",
    Array(
        "VIEW_MODE" => "TEXT",
        "SHOW_PARENT_NAME" => "Y",
        "IBLOCK_ID" => NEWS_IBLOCK,
        "SECTION_ID" => "",
        "SECTION_CODE" => "",
        "SECTION_URL" => "",
        "COUNT_ELEMENTS" => "N",
        "TOP_DEPTH" => "1",
        "SECTION_FIELDS" => "",
        "SECTION_USER_FIELDS" => ['UF_EN_NAME'],
        "ADD_SECTIONS_CHAIN" => "Y",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "CACHE_NOTES" => "",
        "CACHE_GROUPS" => "N",
        "opened" => $_REQUEST['section'],
        "LANG" => "en"
    )       
);?>

<? if ($_POST['search'] && !$searchResults): ?>
    <center style="margin: 150px 0">Nothing found on your request</center>
<? else: ?>
    <?
        global $filter;
        if ($searchResults)
        {
            $filter['ID'] = $searchResults;
        }
        $APPLICATION->IncludeComponent("bitrix:news.list", "news-page", array(
            "FILTER_NAME" => "filter",
            "IBLOCK_ID" => NEWS_IBLOCK,
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
            "PARENT_SECTION_CODE" => $_REQUEST['section'],
            "DISPLAY_TOP_PAGER" => "N",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "main",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "CACHE_FILTER" => "Y",
            "CACHE_GROUPS" => "N",
            "LANG" => "en"
        ), false);
    ?>
<? endif ?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>