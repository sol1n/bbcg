<div class="main-heading main-heading-<?=$arResult['COLOR']?>">
    <div class="wrapper">
        <h1 class="main-heading-title">
            <a href="/news/">
                Новости
            </a>
        </h1>

        <form method="POST" class="main-heading-search-form">
            <input type="search" name="search" class="main-heading-search-input" placeholder="Поиск">
            <input type="submit" value="" class="main-heading-search-submit">
        </form>
    </div>
</div>


<? if ($_POST['search'] && !$searchResults): ?>
    <center style="margin: 150px 0">По вашему запросу ничего не найдено</center>
<? else: ?>
    <?
        global $filter;
        if ($searchResults)
        {
            $filter['ID'] = $searchResults;
        }
        $filter['PROPERTY_SUMMIT'] = $arResult['ID'];
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
            "OPEN_MODAL" => 1
        ), false);
    ?>
<? endif ?>