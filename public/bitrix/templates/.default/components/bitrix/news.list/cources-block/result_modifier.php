<?
    CModule::IncludeModule('iblock');

    foreach ($arResult['ITEMS'] as $k => $item) {
        $end = FormatDate('d.m', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        $begin = FormatDate('d.m', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        
        if ($begin == $end) {
            //One-day course
            if ($arParams['LANG'] == 'en') {
                $arResult['ITEMS'][$k]['DAYS'] = PHPFormatDateTime($item["PROPERTIES"]['END']['VALUE'], 'j');
                $arResult['ITEMS'][$k]['MONTH'] = mb_strtolower(PHPFormatDateTime($item["PROPERTIES"]['BEGIN']['VALUE'], 'F'));
            } else {
                $arResult['ITEMS'][$k]['DAYS'] = FormatDate('j', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                $arResult['ITEMS'][$k]['MONTH'] = mb_strtolower(FormatDate('F', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS")));
            }
        } else {
            $end = FormatDate('m', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $begin = FormatDate('m', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

            if ($begin == $end) {
                //Start and end dates are in one month
                $endDay = FormatDate('j', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                $beginDay = FormatDate('j', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                $arResult['ITEMS'][$k]['DAYS'] = "$beginDay – $endDay";
                if ($arParams['LANG'] == 'en') {
                    $arResult['ITEMS'][$k]['MONTH'] = mb_strtolower(PHPFormatDateTime($item["PROPERTIES"]['BEGIN']['VALUE'], 'F'));
                } else {
                    $arResult['ITEMS'][$k]['MONTH'] = mb_strtolower(FormatDate('F', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS")));                    
                }
            } else {
                //Start and end dates are in different months
                $endDay = FormatDate('j.m', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                $beginDay = FormatDate('j.m', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                $arResult['ITEMS'][$k]['DAYS'] = $beginDay;
                $arResult['ITEMS'][$k]['MONTH'] = $endDay;
                $arResult['ITEMS'][$k]['TWOMONTH'] = true;
            }
        }

        $arResult['ITEMS'][$k]['DETAIL_PAGE_URL'] = '/en' . $arResult['ITEMS'][$k]['DETAIL_PAGE_URL'];
        $arResult['ITEMS'][$k]['NAME'] = !empty($item['PROPERTIES']['EN_NAME']['VALUE']) ? $item['PROPERTIES']['EN_NAME']['VALUE'] : $item['NAME']; 
        $arResult['ITEMS'][$k]['PREVIEW_TEXT'] = !empty($item['PROPERTIES']['EN_PREVIEW_TEXT']['VALUE']['TEXT']) ? $item['PROPERTIES']['EN_PREVIEW_TEXT']['VALUE']['TEXT'] : $item['PREVIEW_TEXT'];
    }
?>