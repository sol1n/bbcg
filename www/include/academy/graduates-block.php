<section class="speakers-block">
    <div class="wrapper">
        <?
            global $filter;
            $filter = ['PROPERTY_ACADEMY_GRADUATES_VALUE' => 'Y'];
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "speakers-row-block",
                Array(
                    "FILTER_NAME" => "filter",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "N",
                    "CACHE_TIME" => "3600",
                    "CACHE_TYPE" => "A",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "DISPLAY_TOP_PAGER" => "N",
                    "FIELD_CODE" => array(),
                    "IBLOCK_ID" => SPEAKERS_IBLOCK,
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "NEWS_COUNT" => "33",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "main",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PROPERTY_CODE" => array("*"),
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_ORDER1" => "DESC",
                    "LANG" => "ru",
                    "TITLE" => "Выпускники магистратуры под эгидой Академии",
                )
            );
        ?>
    </div>
</section>
