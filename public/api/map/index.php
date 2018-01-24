<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-type:application/json;charset=utf-8');

$APPLICATION->IncludeComponent("bitrix:news.list", "map-json", array(
	"IBLOCK_ID" => PLACES_IBLOCK,
	"NEWS_COUNT" => "200",
	"SORT_BY1" => "ID",
	"SORT_ORDER1" => "DESC",
	"FIELD_CODE" => array("DETAIL_TEXT"),
	"PROPERTY_CODE" => array("*"),
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
	"CACHE_TIME" => "3600",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "N",
), false);