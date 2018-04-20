<?
define('NEED_MAP', true);
define('SUMMIT_TEMPLATE', true);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>

<?
    if ($USER->IsAdmin()) {
        $session_access = 'Y';
    } else {
        CModule::IncludeModule('iblock');
        $res = CIBlockElement::GetList(
            ['ID' => 'ASC'],
            ['IBLOCK_ID' => PAGES_IBLOCK, 'ACTIVE' => 'Y', '=CODE' => $_REQUEST['page'], 'PROPERTY_SUMMIT' => $summit['ID']],
            false,
            false,
            ['ID']
        );
        if ($page = $res->Fetch()) {
            $result_page['PAGE_ID'] = $page['ID'];
        }

        if (isset($_SESSION['page-access'][$result_page['PAGE_ID']])){
            $session_access = $_SESSION['page-access'][$result_page['PAGE_ID']]['access'];
        }
    }

    $APPLICATION->IncludeComponent("bitrix:news.detail", 'summit-page', Array (
        "USE_SHARE" => "N",
        "AJAX_MODE" => "N",
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => SUMMITS_IBLOCK,
        "ELEMENT_ID" => "",
        "ELEMENT_CODE" => $_REQUEST['summit'],
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
        "PAGE" => $_REQUEST['page'],
        "SESSION_ACCESS" => $session_access,
    ), false);
?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
