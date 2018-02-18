<div class="wrapper m-t-md m-b-md">
    <? foreach ($arResult['SECTIONS'] as $section): ?>
        <? if ($section['ELEMENT_CNT']): ?>
            <h2 class="text-center"><?=$section['NAME']?></h2>
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "partners-row",
                Array(
                    "ADD_SECTIONS_CHAIN" => "N",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "N",
                    "CACHE_TIME" => "3600",
                    "CACHE_TYPE" => "A",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array(),
                    "IBLOCK_ID" => PARTNERS_IBLOCK,
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "NEWS_COUNT" => "15",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "main",
                    "PARENT_SECTION" => $section['ID'],
                    "PARENT_SECTION_CODE" => "",
                    "PROPERTY_CODE" => array("*"),
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SORT_BY1" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "SORT_BY2" => "ID",
                    "SORT_ORDER2" => "DESC",
                )
            );?>
        <? endif ?>
    <? endforeach ?>
</div>