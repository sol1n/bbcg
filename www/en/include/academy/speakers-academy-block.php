<section class="speakers-block">
    <div class="wrapper">

        <h3 class="speakers-block-title">
            Members of the Academy
        </h3>
        <div class="speakers-block-subtitle">
            More than 50 founders and CEO of the strongest retail companies have joined forces to modernize the system of profile education together with the leading universities of the country. To systematically transfer students their experience, knowledge of technology and understanding of the business of the future.
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
                    "LANG" => "en",
                    "TITLE" => "Honorary President of the Academy of Retail",
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
                    "LANG" => "en",
                    "TITLE" => "Co-Chairs of the Academy of Retail",
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
                    "NEWS_COUNT" => "128",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "main",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "PROPERTY_CODE" => array("*"),
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SORT_BY1" => "PROPERTY_ACADEMY_SORT",
                    "SORT_ORDER1" => "ASC",
                    "LANG" => "en",
                    "TITLE" => "Members of the Academy",
                    "INDEX_PAGE_URL" => "/en/academy/speakers/",
                    "INDEX_PAGE_URL_TITLE" => "All members"
                )
            );
        ?>

    </div>
</section>
