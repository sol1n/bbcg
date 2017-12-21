<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?> 

<main class="main-container main-container-with-header">
    <div class="main-heading main-heading-black">
        <div class="wrapper">
            <h1 class="main-heading-title">Партнеры</h1>
        </div>
    </div>

    <?$APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "partners-page",
        Array(
            "ADD_SECTIONS_CHAIN" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "N",
            "CACHE_TIME" => "3600",
            "CACHE_TYPE" => "A",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(),
            "IBLOCK_ID" => PARTNERS_IBLOCK,
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "NEWS_COUNT" => "50",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "main",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PROPERTY_CODE" => array("*"),
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SORT_BY1" => "SORT",
            "SORT_ORDER1" => "ASC"
        )
    );?>
</main>


<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>