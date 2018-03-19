<?
	$arResult['COLOR'] = isset($arResult['PROPERTIES']['COLOR']['VALUE']) ? $arResult['PROPERTIES']['COLOR']['VALUE'] : 'blue';

	CModule::IncludeModule('iblock');

	$arResult['SECTIONS'] = [];
	$res = CIBlockSection::GetList(
		['SORT' => 'ASC'],
		['IBLOCK_ID' => PARTNERS_IBLOCK, 'ACTIVE' => 'Y'],
		false,
		['ID', 'NAME', 'UF_EN_NAME']
	);
	while ($section = $res->Fetch()) {
		if ($arParams['LANG'] == 'en') {
			$section['NAME'] = !empty($section['UF_EN_NAME']) ? $section['UF_EN_NAME'] : $section['NAME'];
		}
		$arResult['SECTIONS'][$section['ID']] = [
			'NAME' => $section['NAME'],
			'ITEMS' => []
		];
	}

	$res = CIBlockElement::GetList(
    	['SORT' => 'ASC'],
    	['IBLOCK_ID' => PARTNERS_IBLOCK, 'ACTIVE' => 'Y', 'PROPERTY_SUMMIT' => $arResult['ID']],
    	false,
    	false,
    	['NAME', 'IBLOCK_SECTION_ID', 'ID', 'PROPERTY_LINK', 'PREVIEW_PICTURE']
    );

	
	while ($partner = $res->Fetch()) {
		$section = $partner['IBLOCK_SECTION_ID'];
		if ($partner['PREVIEW_PICTURE']) {
			$partner['PREVIEW_PICTURE'] = CFile::GetPath($partner['PREVIEW_PICTURE']);
		}
		$arResult['SECTIONS'][$section]['ITEMS'][] = $partner;
	}

	foreach ($arResult['SECTIONS'] as $index => $section) {
		if (! count($section['ITEMS'])) {
			unset($arResult['SECTIONS'][$index]);
		}
	}
?>