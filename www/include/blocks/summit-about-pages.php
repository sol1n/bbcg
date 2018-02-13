<?
	$obCache = new CPHPCache();
    if($obCache->InitCache(360, $_REQUEST['summit'], '/summit-about-pages'))
    {
       $summit = $obCache->GetVars();
    }
    elseif($obCache->StartDataCache())
    {
      CModule::IncludeModule('iblock');
      $res = CIBlockElement::GetList(
      	['ID' => 'ASC'],
      	['IBLOCK_ID' => SUMMITS_IBLOCK, '=CODE' => $_REQUEST['summit']],
      	false,
      	false,
      	['ID', 'NAME', 'CODE']
      );
      $summit = $res->Fetch();
      $obCache->EndDataCache($summit);
    }

    if ($summit) {
    	    global $aboutPages;
			$aboutPages = ['PROPERTY_SUMMIT' => $summit['ID'], '!CODE' => ['about', 'participants']];
			$APPLICATION->IncludeComponent(
			    "bitrix:news.list",
			    "about-pages",
			    Array(
			        "FILTER_NAME" => "aboutPages",
			        "ADD_SECTIONS_CHAIN" => "N",
			        "CACHE_FILTER" => "N",
			        "CACHE_GROUPS" => "N",
			        "CACHE_TIME" => "3600",
			        "CACHE_TYPE" => "A",
			        "DISPLAY_BOTTOM_PAGER" => "N",
			        "DISPLAY_TOP_PAGER" => "N",
			        "FIELD_CODE" => array(),
			        "IBLOCK_ID" => PAGES_IBLOCK,
			        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			        "NEWS_COUNT" => "3",
			        "PAGER_SHOW_ALWAYS" => "N",
			        "PAGER_TEMPLATE" => "main",
			        "PARENT_SECTION" => "",
			        "PARENT_SECTION_CODE" => "",
			        "PROPERTY_CODE" => array("*"),
			        "SET_STATUS_404" => "N",
			        "SET_TITLE" => "N",
			        "SORT_BY1" => "SORT",
			        "SORT_ORDER1" => "ASC",
			        "SUMMIT_CODE" => $summit['CODE']
			    )
			);
    }
?>