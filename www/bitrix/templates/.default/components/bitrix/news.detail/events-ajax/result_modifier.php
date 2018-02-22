<?
    CModule::IncludeModule('iblock');
	$colors = ["blue", "ink", "yellow", "orange", "red", "magenta", "green", "red-orange", "salad", "navy"];

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

	$themes = [];
	foreach ($arResult['PROPERTIES']['THEMES']['VALUE'] as $k => $theme) {
		if (isset($arResult['PROPERTIES']['THEMES']['DESCRIPTION'][$k])) {
			$index = $arResult['PROPERTIES']['THEMES']['DESCRIPTION'][$k];
			$themes[$index] = $theme;
		}
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
			if (empty($speaker['PREVIEW_PICTURE'])) {
				$exploded = explode(' ', $speaker['NAME']);
				if (is_array($exploded) && count($exploded) == 2) {
					$speaker['LETTERS'] = mb_substr($exploded[0], 0, 1) . mb_substr($exploded[1], 0, 1);
				} else {
					$speaker['LETTERS'] = '?';
				}
				$speaker['COLOR'] = $colors[array_rand($colors)];
			}

			if (isset($themes[$speaker['ID']])) {
				$speaker['theme'] = $themes[$speaker['ID']];
			}

		    $arResult['SPEAKERS'][] = $speaker;
		}
	}

    $begin = FormatDate('j F, G:i', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
	$end = FormatDate('G:i', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

	$arResult['DATE'] = $begin . ' – ' . $end;
?>