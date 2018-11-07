<?
global $speakersFilter;
$speakersFilter = ['PROPERTY_SUMMIT' => $arResult['ID']];
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "speakers-block",
    Array(
        "FILTER_NAME" => "speakersFilter",
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(),
        "IBLOCK_ID" => SPEAKERS_IBLOCK,
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "NEWS_COUNT" => "152",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PROPERTY_CODE" => array("*"),
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "PROPERTY_LASTNAME",
        "SORT_ORDER2" => "ASC",
        "TITLE" => $arResult['SPEAKERS_TITLE']['title'],
        "SUBTITLE" => $arResult['SPEAKERS_TITLE']['subtitle'],
        "INDEX_PAGE_URL" => $arResult['SPEAKERS_TITLE']['link'],
        "LANG" => $arParams['LANG']
    )
);?>
