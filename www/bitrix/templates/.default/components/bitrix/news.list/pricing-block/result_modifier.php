<?
    if ($arParams['EARLY_REGISTRATION']) {
    	if ($arParams['LANG'] == 'en') {
	        $arResult['EARLY_REGISTRATION'] = mb_strtolower(PHPFormatDateTime($arParams['EARLY_REGISTRATION'], 'j F'));
	    } else {
        	$arResult['EARLY_REGISTRATION'] = mb_strtolower(FormatDate('j F', MakeTimeStamp($arParams['EARLY_REGISTRATION'], "DD.MM.YYYY HH:MI:SS")));
        }
    } else {
        $arResult['EARLY_REGISTRATION'] = null;
    }

    foreach ($arResult['ITEMS'] as $k => $item) {
        if ($arParams['LANG'] == 'en') {
            $arResult['ITEMS'][$k]['NAME'] = !empty($item['PROPERTIES']['EN_NAME']['VALUE']) ? $item['PROPERTIES']['EN_NAME']['VALUE'] : $item['NAME']; 
            $arResult['ITEMS'][$k]['PREVIEW_TEXT'] = !empty($item['PROPERTIES']['EN_PREVIEW_TEXT']['VALUE']['TEXT']) ? $item['PROPERTIES']['EN_PREVIEW_TEXT']['VALUE']['TEXT'] : $item['PREVIEW_TEXT'];

            foreach ($item['PROPERTIES'] as $code => $property) {
                if (isset($item['PROPERTIES']['EN_' . $code]['VALUE']) && !empty($item['PROPERTIES']['EN_' . $code]['VALUE'])) {
                    $arResult['ITEMS'][$k]['PROPERTIES'][$code]['VALUE'] = $item['PROPERTIES']['EN_' . $code]['VALUE'];
                }
            }
        }
    }
?>