<?
    CModule::IncludeModule('iblock');

    if (isset($arResult['PROPERTIES']['AREA']['VALUE'][0])) {
	    $res = CIBlockElement::GetList(
	    	['ID' => 'ASC'],
	    	['IBLOCK_ID' => AREAS_IBLOCK, 'ID' => $arResult['PROPERTIES']['AREA']['VALUE'][0]],
	    	false,
	    	false,
	    	['ID', 'NAME']
	    );
	    $arResult['AREA'] = $res->Fetch()['NAME'];
	} else {
		$arResult['AREA'] = null;
	}

	if (is_array($arResult['PROPERTIES']['SPEAKERS']['VALUE']) && count($arResult['PROPERTIES']['SPEAKERS']['VALUE'])) {
		$res = CIBlockElement::GetList(
			['SORT' => 'ASC'],
			['IBLOCK_ID' => SPEAKERS_IBLOCK, 'ID' => $arResult['PROPERTIES']['SPEAKERS']['VALUE'], 'ACTIVE' => 'Y'],
			false,
			false,
			['ID', 'NAME', 'PREVIEW_TEXT', 'PREVIEW_PICTURE', 'DETAIL_PAGE_URL']
		);
		while ($speaker = $res->GetNext()) {
		    $arResult['SPEAKERS'][] = $speaker;
		}
	}

    $begin = FormatDate('j F, G:i', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
	$end = FormatDate('G:i', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

	$arResult['DATE'] = $begin . ' – ' . $end;
?>