<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?> 

<main class="main-container main-container-with-header">
    <div class="main-heading main-heading-black">
        <div class="wrapper">
            <h1 class="main-heading-title">Спикеры</h1>

            <form method="POST" class="main-heading-search-form">
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

	<? include($_SERVER['DOCUMENT_ROOT'] . "/include/speakers/search.php") ?>

    <? if ($_POST['search'] && !$searchResults): ?>
        <center style="margin: 150px 0">По вашему запросу ничего не найдено</center>
    <? else: ?>
        <?
            global $filter;
            if ($_REQUEST['letter'])
            {
                $filter['PROPERTY_LASTNAME'] = $_REQUEST['letter'] . '%';
            }
            if ($searchResults)
            {
                $filter['ID'] = $searchResults;
            }
            $APPLICATION->IncludeComponent("bitrix:news.list", "speakers-page", array(
                "FILTER_NAME" => "filter",
                "IBLOCK_ID" => SPEAKERS_IBLOCK,
                "NEWS_COUNT" => "20",
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "DESC",
                "FIELD_CODE" => array(""),
                "PROPERTY_CODE" => array("*"),
                "SET_TITLE" => "N",
                "SET_STATUS_404" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => "inverse",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "3600",
                "CACHE_FILTER" => "Y",
                "CACHE_GROUPS" => "N",
            ), false);
        ?>
    <? endif ?>
</main>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>