<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?> 

<div class="main-heading main-heading-black">
    <div class="wrapper">
        <h1 class="main-heading-title">Партнеры</h1>
    </div>
</div>

<?$APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "partners-page",
    Array(
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_NOTES" => "",
        "CACHE_TIME" => "360000",
        "CACHE_TYPE" => "A",
        "COUNT_ELEMENTS" => "Y",
        "IBLOCK_ID" => PARTNERS_IBLOCK,
        "IBLOCK_TYPE" => "content",
        "SECTION_CODE" => "",
        "SECTION_FIELDS" => "",
        "SECTION_ID" => "",
        "SECTION_URL" => "",
        "SECTION_USER_FIELDS" => "",
        "SHOW_PARENT_NAME" => "N",
        "TOP_DEPTH" => "1",
        "VIEW_MODE" => "TEXT",
    )
);?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>