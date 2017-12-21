<?
	$end = FormatDate('d.m', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
    $begin = FormatDate('d.m', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
    
    if ($begin == $end) {
        //One-day summit
        $arResult['DURATION'] = FormatDate('j F', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
    } else {
        $end = FormatDate('m', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        $begin = FormatDate('m', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

        if ($begin == $end) {
            //Start and end dates are in one month
            $endDay = FormatDate('j F', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $beginDay = FormatDate('j', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $arResult['DURATION'] = "$beginDay – $endDay";
        } else {
            //Start and end dates are in different months
            $endDay = FormatDate('j F', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $beginDay = FormatDate('j F', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $arResult['DURATION'] = "$beginDay – $endDay";
        }
    }

    $headers = [
    	'NEWS_TITLE' => ['title' => ['Новости']], 
    	'PROGAM_TITLE' => ['title' => 'Сессии и мастер-классы'], 
    	'SPEAKERS_TITLE' => ['title' => ['Спикеры']], 
    	'PARTNERS_TITLE' => ['title' => ['Партнеры']]
    ];
    foreach ($headers as $key => $default) {
    	if (isset($arResult['PROPERTIES'][$key]['VALUE'])) {
    		$arResult[$key] = [
    			'title' => $arResult['PROPERTIES'][$key]['VALUE'],
    			'subtitle' => $arResult['PROPERTIES'][$key]['DESCRIPTION']
    		];
    	} else {
    		$arResult[$key] = $default;
    	}
    }
?>