<section class="speakers-block">
    <div class="wrapper">

        <div class="speakers-block-title">
            Состав Академии ритейла
        </div>
        <div class="speakers-block-subtitle">
            Более 50 основателей и СЕО сильнейших розничных компаний объединили усилия, чтобы вместе с ведущими вузами страны модернизировать систему профильного образования. Чтобы системно передавать студентам свой опыт, знание технологий и понимание бизнеса будущего.
        </div>

        <?
            global $filter;
            $filter = ['PROPERTY_ACADEMY_PRESIDENT_VALUE' => 'Y'];
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
                    "NEWS_COUNT" => "6",
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
                    "TITLE" => "Почетный президент Академии ритейла",
                )
            );
        ?>

        <?
            global $filter;
            $filter = ['PROPERTY_ACADEMY_CO_CHAIRMAN_VALUE' => 'Y'];
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
                    "NEWS_COUNT" => "6",
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
                    "TITLE" => "Сопредседатели Академии ритейла",
                )
            );
        ?>

        <?
            global $filter;
            $filter = ['PROPERTY_ACADEMY_BOARD_VALUE' => 'Y'];
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "speakers-slider-block",
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
                    "NEWS_COUNT" => "32",
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
                    "TITLE" => "Члены Академии ритейла",
                    "INDEX_PAGE_URL" => "/academy/speakers/",
                    "INDEX_PAGE_URL_TITLE" => "Весь состав"
                )
            );
        ?>

    </div>
</section>
