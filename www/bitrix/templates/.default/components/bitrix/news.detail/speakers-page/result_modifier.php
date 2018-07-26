<?
    CModule::IncludeModule('iblock');
    $now_date = date("Y-m-d H:i:s");
    $selected = ['ID', 'NAME', 'PROPERTY_BEGIN', 'PROPERTY_END', 'PROPERTY_EN_NAME', 'PROPERTY_AREA.NAME', 'PROPERTY_AREA.PROPERTY_EN_NAME', 'PROPERTY_SUMMIT.CODE'];
    $res = CIBlockElement::GetList(['PROPERTY_BEGIN' => 'DESC'], ['IBLOCK_ID' => EVENTS_IBLOCK, 'PROPERTY_SPEAKERS' => $arResult['ID'], '>PROPERTY_END' => $now_date], false, false, $selected);
    while ($event = $res->Fetch()) {
    	if ($arParams['LANG'] == 'en') {
    		$event['DETAIL_PAGE_URL'] = '/en/' . $event['PROPERTY_SUMMIT_CODE'] . '/events/' . $event['ID'] . '/';
    		$event['DATE'] = mb_strtolower(PHPFormatDateTime($event['PROPERTY_BEGIN_VALUE'], 'j F, h:i'));
    		$event['NAME'] = !empty($event['PROPERTY_EN_NAME_VALUE']) ? $event['PROPERTY_EN_NAME_VALUE'] : $event['NAME'];
    		$event['PROPERTY_AREA_NAME'] = !empty($event['PROPERTY_AREA_PROPERTY_EN_NAME_VALUE'])
    			? $event['PROPERTY_AREA_PROPERTY_EN_NAME_VALUE']
    			: $event['PROPERTY_AREA_NAME'];
    	} else {
    		$event['DETAIL_PAGE_URL'] = '/' . $event['PROPERTY_SUMMIT_CODE'] . '/events/' . $event['ID'] . '/';
    		$event['DATE'] = mb_strtolower(FormatDate('j F, h:i', MakeTimeStamp($event['PROPERTY_BEGIN_VALUE'], "DD.MM.YYYY HH:MI:SS")));
    	}
        if (isset($arResult['EVENTS'][$event['ID']]['PROPERTY_AREA_NAME'])) {
            $event['PROPERTY_AREA_NAME'] = $arResult['EVENTS'][$event['ID']]['PROPERTY_AREA_NAME'] . ', ' . $event['PROPERTY_AREA_NAME'];
        }
    	$arResult['EVENTS'][$event['ID']] = $event;
    }

    if ($arParams['LANG'] == 'en') {
        $arResult['NAME'] = !empty($arResult['PROPERTIES']['EN_NAME']['VALUE']) ? $arResult['PROPERTIES']['EN_NAME']['VALUE'] : $arResult['NAME'];
        $arResult['PREVIEW_TEXT'] = !empty($arResult['PROPERTIES']['EN_PREVIEW_TEXT']['VALUE']['TEXT'])
        	? $arResult['PROPERTIES']['EN_PREVIEW_TEXT']['VALUE']['TEXT']
        	: $arResult['PREVIEW_TEXT'];
        $arResult['~DETAIL_TEXT'] = !empty($arResult['PROPERTIES']['EN_DETAIL_TEXT']['~VALUE']['TEXT'])
        	? $arResult['PROPERTIES']['EN_DETAIL_TEXT']['~VALUE']['TEXT']
        	: $arResult['~DETAIL_TEXT'];
	}
?>
