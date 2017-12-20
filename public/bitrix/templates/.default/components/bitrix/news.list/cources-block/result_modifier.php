<?
    CModule::IncludeModule('iblock');

    foreach ($arResult['ITEMS'] as $k => $item) {
        $end = FormatDate('d.m', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        $begin = FormatDate('d.m', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        
        if ($begin == $end) {
            //One-day course
            $arResult['ITEMS'][$k]['DAYS'] = FormatDate('j', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $arResult['ITEMS'][$k]['MONTH'] = FormatDate('F', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        } else {
            $end = FormatDate('m', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $begin = FormatDate('m', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

            if ($begin == $end) {
                //Start and end dates are in one month
                $endDay = FormatDate('j', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                $beginDay = FormatDate('j', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                $arResult['ITEMS'][$k]['DAYS'] = "$beginDay – $endDay";
                $arResult['ITEMS'][$k]['MONTH'] = FormatDate('F', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            } else {
                //Start and end dates are in different months
                $endDay = FormatDate('j.m', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                $beginDay = FormatDate('j.m', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                $arResult['ITEMS'][$k]['DAYS'] = $beginDay;
                $arResult['ITEMS'][$k]['MONTH'] = $endDay;
                $arResult['ITEMS'][$k]['TWOMONTH'] = true;
            }
        }
    }
?>