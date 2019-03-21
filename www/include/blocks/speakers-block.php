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
        "LANG" => "ru",
        "TITLE" => "300+ спикеров",
        /*
        "SUBTITLE" => "Для зарегистрированных пользователей доступ к уникальному сервису:<br/> \"knowledge on demand\", персональные сессии с рядом спикеров*",
        "DESCRIPTION" => "* Академики и спикеры BBCG в ряде случаев готовы проводить персональные сессии, делиться знаниями напрямую с участниками рынка и помогать в разработке стратегий развития бизнеса. Форматы: интерактивные онлайн сессии, деловые завтраки, стратегические сессии или коучинг."
        */
    )
);?>
