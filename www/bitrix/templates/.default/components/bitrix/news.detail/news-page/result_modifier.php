<?
    if ($arParams['LANG'] == 'en') {
        $arResult['NAME'] = !empty($arResult['PROPERTIES']['EN_NAME']['VALUE']) ? $arResult['PROPERTIES']['EN_NAME']['VALUE'] : $arResult['NAME']; 
        $arResult['~DETAIL_TEXT'] = !empty($arResult['PROPERTIES']['EN_DETAIL_TEXT']['~VALUE']['TEXT']) 
        	? $arResult['PROPERTIES']['EN_DETAIL_TEXT']['~VALUE']['TEXT'] 
        	: $arResult['~DETAIL_TEXT'];
        $arResult['DAY'] = PHPFormatDateTime($arResult['ACTIVE_FROM'], 'j');
    	$arResult['DATE'] = mb_strtolower(PHPFormatDateTime($arResult['ACTIVE_FROM'], 'F, Y'));
	} else {
		$arResult['DAY'] = FormatDate('j', MakeTimeStamp($arResult['ACTIVE_FROM'], "DD.MM.YYYY HH:MI:SS"));
    	$arResult['DATE'] = mb_strtolower(FormatDate('F, Y', MakeTimeStamp($arResult['ACTIVE_FROM'], "DD.MM.YYYY HH:MI:SS")));
	}	
?>