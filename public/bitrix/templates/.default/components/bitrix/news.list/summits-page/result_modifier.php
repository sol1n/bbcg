<?
    foreach ($arResult['ITEMS'] as $k => $item) {
        if ($arParams['LANG'] == 'en') {
            $arResult['ITEMS'][$k]['DETAIL_PAGE_URL'] = '/en/' . $item['CODE'] . '/';
            $arResult['ITEMS'][$k]['NAME'] = !empty($item['PROPERTIES']['EN_NAME']['VALUE']) ? $item['PROPERTIES']['EN_NAME']['VALUE'] : $item['NAME']; 
            $arResult['ITEMS'][$k]['PREVIEW_TEXT'] = !empty($item['PROPERTIES']['EN_PREVIEW_TEXT']['VALUE']['TEXT']) 
                ? $item['PROPERTIES']['EN_PREVIEW_TEXT']['VALUE']['TEXT'] 
                : $item['PREVIEW_TEXT'];
            foreach ($item['PROPERTIES'] as $code => $property) {
                if (isset($item['PROPERTIES']['EN_' . $code]['VALUE']) && !empty($item['PROPERTIES']['EN_' . $code]['VALUE'])) {
                    $arResult['ITEMS'][$k]['PROPERTIES'][$code]['VALUE'] = $item['PROPERTIES']['EN_' . $code]['VALUE'];
                }
            }

        } else {
            $arResult['ITEMS'][$k]['DETAIL_PAGE_URL'] = '/' . $item['CODE'] . '/';
        }

        $end = FormatDate('d.m', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        $begin = FormatDate('d.m', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        
        if ($begin == $end) {
            //One-day summit
            if ($arParams['LANG'] == 'en') {
                $arResult['ITEMS'][$k]['DURATION'] = mb_strtolower(PHPFormatDateTime($item["PROPERTIES"]['END']['VALUE'], 'j F'));
            } else {
                $arResult['ITEMS'][$k]['DURATION'] = mb_strtolower(FormatDate('j F', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS")));
            }
        } else {
            $end = FormatDate('m', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $begin = FormatDate('m', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

            if ($begin == $end) {
                //Start and end dates are in one month
                if ($arParams['LANG'] == 'en') {
                    $endDay = PHPFormatDateTime($item["PROPERTIES"]['END']['VALUE'], 'j F');
                    $beginDay = PHPFormatDateTime($item["PROPERTIES"]['BEGIN']['VALUE'], 'j');
                } else {
                    $endDay = FormatDate('j F', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                    $beginDay = FormatDate('j', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                }
                $arResult['ITEMS'][$k]['DURATION'] = mb_strtolower("$beginDay – $endDay");
            } else {
                //Start and end dates are in different months
                if ($arParams['LANG'] == 'en') {
                    $endDay = PHPFormatDateTime($item["PROPERTIES"]['END']['VALUE'], 'j F');
                    $beginDay = PHPFormatDateTime($item["PROPERTIES"]['BEGIN']['VALUE'], 'j F');
                } else {
                    $endDay = FormatDate('j F', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                    $beginDay = FormatDate('j F', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                }
                $arResult['ITEMS'][$k]['DURATION'] = mb_strtolower("$beginDay – $endDay");
            }
        }
    }
?>