<?
    CModule::IncludeModule('iblock');

    if (isset($arResult['PROPERTIES']['AREA']['VALUE'][0])) {
	    $res = CIBlockElement::GetList(
	    	['ID' => 'ASC'],
	    	['IBLOCK_ID' => AREAS_IBLOCK, 'ID' => $arResult['PROPERTIES']['AREA']['VALUE'][0]],
	    	false,
	    	false,
	    	['ID', 'NAME', 'PROPERTY_EN_NAME']
	    );
	    $area = $res->Fetch();
	    if ($arParams['LANG'] == 'en') {
	    	$arResult['AREA'] = !empty($area['PROPERTY_EN_NAME_VALUE']) ? $area['PROPERTY_EN_NAME_VALUE'] : $area['NAME'];
	    } else {
	    	$arResult['AREA'] = $area['NAME'];
	    }
	} else {
		$arResult['AREA'] = null;
	}

	if ($arParams['LANG'] == 'en') {
        $arResult['NAME'] = !empty($arResult['PROPERTIES']['EN_NAME']['VALUE']) ? $arResult['PROPERTIES']['EN_NAME']['VALUE'] : $arResult['NAME']; 
        $arResult['~DETAIL_TEXT'] = !empty($arResult['PROPERTIES']['EN_DETAIL_TEXT']['~VALUE']['TEXT']) 
        	? $arResult['PROPERTIES']['EN_DETAIL_TEXT']['~VALUE']['TEXT'] 
        	: $arResult['~DETAIL_TEXT'];
        $arResult['DATE'] = mb_strtolower(PHPFormatDateTime($arResult["ACTIVE_FROM"], 'j F'));
	} else {
		$arResult['DATE'] = mb_strtolower(FormatDate('j F', MakeTimeStamp($arResult["ACTIVE_FROM"], "DD.MM.YYYY HH:MI:SS")));
	}	
?>