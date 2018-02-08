<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?> 

<div class="main-heading main-heading-black">
    <div class="wrapper">
        <h1 class="main-heading-title">
            <a href="/en/news/">
                News
            </a>
        </h1>

        <form method="GET" action="/en/news/" class="main-heading-search-form" data-suggest-search="/api/search/news/?lang=en">
            <input type="search" name="search" class="main-heading-search-input" placeholder="Search">
            <input type="submit" value="" class="main-heading-search-submit">
        </form>
    </div>
</div>

<? include($_SERVER['DOCUMENT_ROOT'] . "/include/news/search.php") ?>

<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "news-subnav",
    Array(
        "VIEW_MODE" => "TEXT",
        "SHOW_PARENT_NAME" => "Y",
        "IBLOCK_ID" => NEWS_IBLOCK,
        "SECTION_ID" => "",
        "SECTION_CODE" => "",
        "SECTION_URL" => "",
        "COUNT_ELEMENTS" => "N",
        "TOP_DEPTH" => "1",
        "SECTION_FIELDS" => "",
        "SECTION_USER_FIELDS" => ['UF_EN_NAME'],
        "ADD_SECTIONS_CHAIN" => "Y",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "CACHE_NOTES" => "",
        "CACHE_GROUPS" => "N",
        "opened" => $_REQUEST['section'],
        "LANG" => "en"
    )       
);?>

<?
  $APPLICATION->IncludeComponent("bitrix:news.detail", 'news-page', Array(
        "USE_SHARE" => "N",
        "AJAX_MODE" => "N",
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => NEWS_IBLOCK,
        "ELEMENT_ID" => "",
        "ELEMENT_CODE" => $_REQUEST['element'],
        "CHECK_DATES" => "Y",
        "FIELD_CODE" => Array("ID", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DATE_CREATE", "CREATED_BY"),
        "PROPERTY_CODE" => Array("*"),
        "SET_TITLE" => "Y",
        "SET_CANONICAL_URL" => "Y",
        "SET_BROWSER_TITLE" => "Y",
        "BROWSER_TITLE" => "EN_NAME",
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
        "LANG" => "en"
    ),
false
);
?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>