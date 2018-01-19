<?
    use \Bitrix\Main\Localization\Loc;
?>
<div class="main-heading main-heading-<?=$arResult['COLOR']?>">
    <div class="wrapper">
        <h1 class="main-heading-title">
            <?=Loc::GetMessage('SPEAKERS', [], $arParams['LANG'])?>
        </h1>

        <form method="GET" class="main-heading-search-form">
            <input
                value="<?=htmlspecialchars($arParams['SEARCH'])?>"
                type="search" 
                name="search" 
                class="main-heading-search-input" 
                placeholder="Поиск"
            >
            <input type="submit" value="" class="main-heading-search-submit">
        </form>
    </div>
</div>

<? if ($arParams['SEARCH'] && !$arResult['searchResults']): ?>
    <center style="margin: 150px 0"><?=Loc::GetMessage('NOT_FOUND', [], $arParams['LANG'])?></center>
<? else: ?>
    <?
    global $filter;
    if ($arResult['searchResults'])
    {
        $filter['ID'] = $arResult['searchResults'];
    }
    $filter['PROPERTY_SUMMIT'] = $arResult['ID'];
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "speakers-page",
        Array(
            "FILTER_NAME" => "filter",
            "ADD_SECTIONS_CHAIN" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "N",
            "CACHE_TIME" => "3600",
            "CACHE_TYPE" => "A",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(),
            "IBLOCK_ID" => SPEAKERS_IBLOCK,
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "NEWS_COUNT" => "20",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "main",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PROPERTY_CODE" => array("*"),
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SORT_BY1" => "SORT",
            "SORT_ORDER1" => "ASC",
            "OPEN_MODAL" => 1
        )
    );?>
<? endif ?>