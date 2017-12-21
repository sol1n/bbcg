<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?> 

<main class="main-container main-container-with-header">
    <div class="main-heading main-heading-black">
        <div class="wrapper">
            <h1 class="main-heading-title">
                <a href="/speakers/">
                    Спикеры
                </a>
            </h1>

            <form method="POST" action="/speakers/" class="main-heading-search-form">
                <input type="search" name="search" class="main-heading-search-input" placeholder="Поиск">
                <input type="submit" value="" class="main-heading-search-submit">
            </form>
        </div>
    </div>

    <?$APPLICATION->IncludeFile(
      SITE_DIR."include/speakers/alphabet-ru.php",
      Array(),
      Array("MODE"=>"html")
      );
    ?>


    <?
      $APPLICATION->IncludeComponent("bitrix:news.detail", 'speakers-page', Array(
            "USE_SHARE" => "N",
            "AJAX_MODE" => "N",
            "IBLOCK_TYPE" => "content",
            "IBLOCK_ID" => SPEAKERS_IBLOCK,
            "ELEMENT_ID" => $_REQUEST['element'],
            "ELEMENT_CODE" => "",
            "CHECK_DATES" => "Y",
            "FIELD_CODE" => Array("ID", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DATE_CREATE", "CREATED_BY"),
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
        ),
    false
    );
    ?>

</main>


<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>