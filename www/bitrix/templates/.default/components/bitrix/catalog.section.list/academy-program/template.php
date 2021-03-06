<? if (count($arResult['SECTIONS'])): ?>
    <?
        global $arrFilter;
        $arrFilter = Array(
            "!PROPERTY_ARCHIVE_VALUE" => "Y"
        );
    ?>
  <? foreach ($arResult['SECTIONS'] as $section): ?>
    <?
        $section_name = $section['NAME'];
        if($arParams['LANG'] == 'en'){
            $section_name = $section['DESCRIPTION'];
        }
    ?>
    <? $APPLICATION->IncludeComponent(
      "bitrix:news.list",
      "cources-page",
      array(
        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
        "NEWS_COUNT" => "30",
        "FILTER_NAME" => "arrFilter",
        "SORT_BY1" => "PROPERTY_BEGIN",
        "SORT_ORDER1" => "ASC",
        "FIELD_CODE" => array('DATE_CREATE', 'DATE_ACTIVE_FROM'),
        "PROPERTY_CODE" => array("*"),
        "SET_TITLE" => "N",
        "SET_STATUS_404" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "PARENT_SECTION" => $section['ID'],
        "PARENT_SECTION_CODE" => "",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "360000",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "N",
        'NAME' => $section_name,
        "LANG" => $arParams['LANG']
      ),
      false
    );?>

  <? endforeach ?>

<? endif ?>
<div class="archive-bitton-wrapper">
    <? if(CSite::InDir('/academy/')) :?>
        <a href="/academy/programs/archive/" target="_blank" class="button button-red m-r-md">Архив мероприятий</a>
    <? endif ?>
</div>
