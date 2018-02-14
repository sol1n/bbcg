<?
	CModule::IncludeModule('iblock');

	function getSummitProperty($id, $code, $default)
	{
		$res = CIBlockElement::GetProperty(SUMMITS_IBLOCK, $id, array("sort" => "asc"), Array("CODE" => $code));
		$result = $res->Fetch();

		return isset($result['VALUE']) && $result['VALUE'] ? $result['VALUE'] : $default;
	}

	
	$APPLICATION->SetPageProperty('color', getSummitProperty($arResult['ID'], 'COLOR', 'blue'));

	$logo = getSummitProperty($arResult['ID'], 'HEADER_LOGO', null);

	if (!is_null($logo)) 
	{
		$APPLICATION->SetPageProperty('logo', CFile::GetPath($logo));
	} else 
	{
		$APPLICATION->SetPageProperty('logo', '/assets/images/logo.svg');
	}

	$element = CIblockElement::GetByID($arResult['ID'])->Fetch();
	$APPLICATION->SetPageProperty('name', $element['NAME']);
	$APPLICATION->SetPageProperty('code', $element['CODE']);
	$APPLICATION->SetPageProperty('description', $element['PREVIEW_TEXT']);

	if ($element['PREVIEW_PICTURE']) {
		$APPLICATION->SetPageProperty('image', CFile::GetPath($element['PREVIEW_PICTURE']));
	}
?>