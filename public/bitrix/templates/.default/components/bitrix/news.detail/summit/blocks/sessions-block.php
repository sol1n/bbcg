<?
global $sessionsFilter;
$sessionsFilter = ['PROPERTY_SUMMIT' => $arResult['ID']];
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "sessions-block",
    Array(
        "FILTER_NAME" => "sessionsFilter",
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
        "NEWS_COUNT" => "32",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PROPERTY_CODE" => array("*"),
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "TITLE" => $arResult['PROGRAM_TITLE']['title'],
        "SUBTITLE" => $arResult['PROGRAM_TITLE']['subtitle'],
    )
);?>