<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "speakers-block",
    Array(
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
        "NEWS_COUNT" => "30",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PROPERTY_CODE" => array("*"),
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SORT_BY1" => "PROPERTY_MAINPAGE_SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "PROPERTY_LASTNAME",
        "SORT_ORDER2" => "ASC",
        "LANG" => "en",
        "TITLE" => "300+ speakers",
        /*
        "SUBTITLE" => "For registered users access to a unique service: <br/>\"knowledge on demand\", personal sessions with a number of speakers *",
        "DESCRIPTION" => "* Academics and BBCG speakers are in some cases ready to conduct personal sessions, share knowledge directly with market participants and help in developing business development strategies. Formats: interactive online sessions, business breakfasts, strategic sessions or coaching. The process is coordinated by Elizabeth Nosenko, the director of the educational programs of the Academy of Retail:  <a href=\"E.Nosenko@b2bcg.ru\">E.Nosenko@b2bcg.ru</a>, <a href=\"tel:+74957852206\">+74957852206</a>."
        */
    )
);?>
