<?
    use \Bitrix\Main\Localization\Loc;
?>
<? if (is_numeric($arResult['PROPERTIES']['EVENTS_ROW_HEIGHT']['VALUE'])): ?>
    <style>
        .program-table {
            --program-table-hour-height: <?=$arResult['PROPERTIES']['EVENTS_ROW_HEIGHT']['VALUE']?>px;
        }
    </style>
<? endif ?>

<div class="main-heading main-heading-<?=$arResult['COLOR']?> program-table-main-heading">
    <div class="wrapper">
        <h1 class="main-heading-title">
            <?=Loc::GetMessage('PROGRAM', [], $arParams['LANG'])?>
        </h1>

        <div>
            <div class="main-heading-tabs">
                <? foreach ($arResult['DATES'] as $k => $date): ?>
                    <? if ($arParams['DATE'] == $k): ?>
                        <? if ($arParams['LANG'] == 'en'): ?>
                            <a href="/en/<?=$arResult['CODE']?>/events/<?=$k?>/" class="main-heading-tabs-item active">
                                <?=$date?>
                            </a>
                        <? else: ?>
                            <a href="/<?=$arResult['CODE']?>/events/<?=$k?>/" class="main-heading-tabs-item active">
                                <?=$date?>
                            </a>
                        <? endif ?>
                    <? else: ?>
                        <? if ($arParams['LANG'] == 'en'): ?>
                            <a href="/en/<?=$arResult['CODE']?>/events/<?=$k?>/" class="main-heading-tabs-item">
                                <?=$date?>
                            </a>
                        <? else: ?>
                            <a href="/<?=$arResult['CODE']?>/events/<?=$k?>/" class="main-heading-tabs-item">
                                <?=$date?>
                            </a>
                        <? endif ?>
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
                    <span>
                        <?=Loc::GetMessage('ALL PROGRAM', [], $arParams['LANG'])?>
                    </span>
                </a>
            </li>
        </ul>

        <? if(!empty($arResult['PROPERTIES']['PROGRAM_FOR_DOWNLOAD']['VALUE'])):?>
            <? $download_link = CFile::GetPath($arResult['PROPERTIES']['PROGRAM_FOR_DOWNLOAD']['VALUE']); ?>
            <li class="program-table-pagination-item program-download-button">
                <a href="<?=$download_link?>" target="_blank" download="invoice">
                    <?=Loc::GetMessage('DOWNLOAD PROGRAM', [], $arParams['LANG'])?>
                </a>
            </li>
        <? endif ?>

        <ul class="subnav-list subnav-list-program subnav-list-wide subnav-list-right">
            <li class="subnav-list-item">
                <form
                    method="GET"
                    data-suggest-search="/api/search/events/?lang=<?=$arParams['LANG']?>&summit=<?=$arResult['ID']?>"
                    class="program-table-search"
                >
                    <input type="text" class="program-table-search-input" placeholder="<?=Loc::GetMessage('EVENTS SEARCH', [], $arParams['LANG'])?>" name="search">
                    <button type="submit" class="program-table-search-button"></button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<?
global $eventsFilter;
$eventsFilter = $arParams['FILTER'];
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "events-page",
    Array(
        "FILTER_NAME" => "eventsFilter",
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(),
        "IBLOCK_ID" => EVENTS_IBLOCK,
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "NEWS_COUNT" => "1000",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PROPERTY_CODE" => array("*"),
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SORT_BY1" => "PROPERTY_BEGIN",
        "SORT_ORDER1" => "ASC",
        "DATE" => $arParams['DATE'],
        "SUMMIT" => $arResult['CODE'],
        "LANG" => $arParams['LANG']
    )
);?>

<div class="wrapper m-t-lg m-b-lg text-center">
    <ul class="program-table-pagination">
        <? foreach ($arResult['DATES'] as $k => $date): ?>
            <?php
                $url = "/" . $arResult['CODE'] . "/events/$k/";
                $active = "";
                if ($arParams['LANG'] == 'en') {
                    $url = "/en" . $url;
                }
                if ($arParams['DATE'] == $k) {
                    $active = "active";
                }
            ?>
            <li class="program-table-pagination-item <?=$active?>">
                <a href="<?=$url?>">
                    <?=$date?>
                </a>
            </li>
        <? endforeach ?>
    </ul>
</div>
