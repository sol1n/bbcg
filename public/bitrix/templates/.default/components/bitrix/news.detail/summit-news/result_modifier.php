<?
	if ($arParams['LANG'] == 'en') {
		$arResult['INDEX_PAGE_URL'] = '/en/' . $arResult['CODE'] . '/news/';
	} else {
		$arResult['INDEX_PAGE_URL'] = '/' . $arResult['CODE'] . '/news/';
	}
	$arResult['COLOR'] = isset($arResult['PROPERTIES']['COLOR']['VALUE']) ? $arResult['PROPERTIES']['COLOR']['VALUE'] : 'blue';


	if ($arParams['SEARCH'])
	{
		CModule::IncludeModule('search');
		CModule::IncludeModule('iblock');

		$obSearch = new CSearch;
		$obSearch->Search(array(
			'QUERY' => $arParams['SEARCH'],
			'MODULE_ID' => 'iblock',
			'PARAM1' => 'content',
			'PARAM2' => NEWS_IBLOCK
		));

		while($searchResult = $obSearch->GetNext()){
			$arResult['searchResults'][] = $searchResult['ITEM_ID'];
		}
	}
?>