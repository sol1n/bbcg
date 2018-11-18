<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>

<div class="main-heading main-heading-black m-b-lg">
    <div class="wrapper">
        <h1 class="main-heading-title">
            <a href="/academy/teachers/">
                Преподаватели академии ритейла
            </a>
        </h1>

        <form method="GET" action="/speakers/" class="main-heading-search-form" data-suggest-search="/api/search/speakers/">
            <input
                type="search"
                name="search"
                class="main-heading-search-input"
                placeholder="Поиск"
                value="<?=htmlspecialchars($_GET['search'])?>"
            >
            <input type="submit" value="" class="main-heading-search-submit">
        </form>
    </div>
</div>

<?
    global $filter;
    $filter = ['PROPERTY_ACADEMY_TEACHERS_VALUE' => 'Y'];
    $APPLICATION->IncludeComponent("bitrix:news.list", "speakers-page", array(
        "FILTER_NAME" => "filter",
        "IBLOCK_ID" => SPEAKERS_IBLOCK,
        "NEWS_COUNT" => "16",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "FIELD_CODE" => array("ACTIVE_FROM"),
        "PROPERTY_CODE" => array("*"),
        "SET_TITLE" => "N",
        "SET_STATUS_404" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "N",
        "SORT_BY1" => "PROPERTY_ACADEMY_SORT",
        "SORT_ORDER1" => "ASC",
    ), false);
?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
