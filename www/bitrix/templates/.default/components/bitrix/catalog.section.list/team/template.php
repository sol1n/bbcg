<? foreach ($arResult['SECTIONS'] as $section): ?>
    <div class="m-b-lg team-block">
        <h2><?=$section['NAME']?></h2>

        <? if ($section['DESCRIPTION']): ?>
            <?=$section['~DESCRIPTION']?>
        <? endif ?>

        <?
            if ($section['ELEMENT_CNT']) {
                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "team-row-block",
                    Array(
                        "ADD_SECTIONS_CHAIN" => "N",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "N",
                        "CACHE_TIME" => "3600",
                        "CACHE_TYPE" => "A",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array(),
                        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "NEWS_COUNT" => "26",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => "main",
                        "PARENT_SECTION" => $section['ID'],
                        "PARENT_SECTION_CODE" => "",
                        "PROPERTY_CODE" => array("*"),
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_ORDER1" => "DESC",
                        "LANG" => $arParams['LANG'],
                    )
                );
            }
        ?>
    </div>
<? endforeach ?>