<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

CModule::IncludeModule('search');

$filter = array(
    'SITE_ID' => LANG,
    'MODULE_ID' => 'iblock',
    'PARAM1' => 'content',
    'PARAM2' => EVENTS_IBLOCK
);

$obTitle = new CSearchTitle;

$obTitle->Search(
    $_REQUEST['query'],
    200,
    $filter,
    false,
    ['ID' => 'ASC']
);

while($arResult = $obTitle->GetNext()){
  $searchResults[] = $arResult['ITEM_ID'];
}

header('Content-type:application/json;charset=utf-8');

if (count($searchResults) && isset($_REQUEST['summit']) && !empty($_REQUEST['summit']))
{
    global $programFilter;
    $programFilter = ['ID' => $searchResults, 'PROPERTY_SUMMIT' => $_REQUEST['summit']];

    CModule::IncludeModule('iblock');
    $summit = CIBlockElement::GetByID($_REQUEST['summit'])->Fetch();

    $APPLICATION->IncludeComponent("bitrix:news.list", "search-json", array(
        "FILTER_NAME" => "programFilter",
        "IBLOCK_ID" => EVENTS_IBLOCK,
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "FIELD_CODE" => array(),
        "PROPERTY_CODE" => array(),
        "SET_TITLE" => "N",
        "SET_STATUS_404" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "360",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "N",
        "LANG" => $_REQUEST['lang'],
        "URL_PREFIX" => '/' . $summit['CODE']
    ), false);
}
else
{
    echo json_encode(['suggestions' => []]);
}
?>
