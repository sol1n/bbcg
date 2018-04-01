<?
	CModule::IncludeModule('iblock');

	$element = CIblockElement::GetByID($arResult['ID'])->Fetch();
	$APPLICATION->SetPageProperty('description', $element['PREVIEW_TEXT']);

	if ($element['PREVIEW_PICTURE']) {
		$APPLICATION->SetPageProperty('image', CFile::GetPath($element['PREVIEW_PICTURE']));
	}
?>