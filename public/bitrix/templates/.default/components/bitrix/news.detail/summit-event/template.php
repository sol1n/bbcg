<div class="main-heading main-heading-<?=$arResult['COLOR']?> program-table-main-heading">
    <div class="wrapper">
        <h1 class="main-heading-title">Программа</h1>

        <div>
            <div class="main-heading-tabs">
                <? foreach ($arResult['DATES'] as $k => $date): ?>
                    <? if ($arParams['DATE'] == $k): ?>
                        <a href="/<?=$arResult['CODE']?>/events/<?=$k?>/" class="main-heading-tabs-item active">
                            <?=$date?>
                        </a>
                    <? else: ?>
                        <a href="/<?=$arResult['CODE']?>/events/<?=$k?>/" class="main-heading-tabs-item">
                            <?=$date?>
                        </a>
                    <? endif ?>
                <? endforeach ?>
            </div>
        </div>
    </div>
</div>

<nav class="subnav program-table-subnav">
    <div class="wrapper">
        <ul class="subnav-list subnav-list-program subnav-list-wide subnav-list-program-menu">
            <li class="subnav-list-item">
                <a class="subnav-link">
                    <span>Вся программа</span>
                </a>
            </li>
        </ul>

        <ul class="subnav-list subnav-list-program subnav-list-wide subnav-list-right">
            <li class="subnav-list-item">
                <form 
                    method="GET" 
                    data-suggest-search="/api/search/events/?lang=<?=$arParams['LANG']?>&summit=<?=$arResult['ID']?>" 
                    class="program-table-search"
                >
                    <input type="text" class="program-table-search-input" placeholder="Поиск событий" name="search">
                    <button type="submit" class="program-table-search-button"></button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<?
    $APPLICATION->IncludeComponent("bitrix:news.detail", 'events-page', Array (
        "USE_SHARE" => "N",
        "AJAX_MODE" => "N",
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => EVENTS_IBLOCK,
        "ELEMENT_ID" => $arParams['EVENT'],
        "ELEMENT_CODE" => '',
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
    ), false);
?>