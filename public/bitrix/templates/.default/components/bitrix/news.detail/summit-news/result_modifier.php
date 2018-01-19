<?
	if ($arParams['LANG'] == 'en') {
		$arResult['INDEX_PAGE_URL'] = '/en/' . $arResult['CODE'] . '/news/';
	} else {
		$arResult['INDEX_PAGE_URL'] = '/' . $arResult['CODE'] . '/news/';
	}
	$arResult['COLOR'] = isset($arResult['PROPERTIES']['COLOR']['VALUE']) ? $arResult['PROPERTIES']['COLOR']['VALUE'] : 'blue';
?>