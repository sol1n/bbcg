<?
global $filter;
$filter = ['PROPERTY_ACADEMY_VALUE' => 'Y'];
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "contacts-block",
    Array(
        "FILTER_NAME" => "filter",
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(),
        "IBLOCK_ID" => CONTACTS_IBLOCK,
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "NEWS_COUNT" => "4",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PROPERTY_CODE" => array("*"),
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "NAME" => $arResult['NAME'],
        "ANDROID_APP_LINK" => $arResult['PROPERTIES']['ANDROID_APP_LINK']['VALUE'],
        "IOS_APP_LINK" => $arResult['PROPERTIES']['IOS_APP_LINK']['VALUE'],
        "LANG" => $arParams['LANG'],
        "HIDE_APPS" => 1,
        "LANG" => "en"
    )
);?>