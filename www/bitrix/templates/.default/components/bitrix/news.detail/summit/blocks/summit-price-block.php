<?
if(strtotime($now_date) < strtotime($end_date)){//variables from about-summit-block.php(summit news.detail)
    global $pricingFilter;
    $pricingFilter = ['PROPERTY_SUMMIT' => $arResult['ID']];
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "pricing-block",
        Array(
            "FILTER_NAME" => "pricingFilter",
            "ADD_SECTIONS_CHAIN" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "N",
            "CACHE_TIME" => "3600",
            "CACHE_TYPE" => "A",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(),
            "IBLOCK_ID" => PRICING_IBLOCK,
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
            "EARLY_REGISTRATION" => $arResult['PROPERTIES']['EARLY_REGISTRATION']['VALUE'],
            "LANG" => $arParams['LANG']
        )
    );
}
?>
