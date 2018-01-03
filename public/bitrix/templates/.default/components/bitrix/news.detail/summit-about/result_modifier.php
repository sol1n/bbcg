<?
	CModule::IncludeModule('iblock');

	$arResult['COLOR'] = isset($arResult['PROPERTIES']['COLOR']['VALUE']) ? $arResult['PROPERTIES']['COLOR']['VALUE'] : 'blue';

	$end = FormatDate('d.m', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
    $begin = FormatDate('d.m', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
    
    if ($begin == $end) {
        //One-day summit
        $arResult['DAYS'] = FormatDate('j', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        $arResult['MONTH'] = FormatDate('F', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
    } else {
        $end = FormatDate('m', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        $begin = FormatDate('m', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

        if ($begin == $end) {
            //Start and end dates are in one month
            $endDay = FormatDate('j', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $beginDay = FormatDate('j', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $arResult['DAYS'] = "$beginDay – $endDay";
            $arResult['MONTH'] = FormatDate('F', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        } else {
            //Start and end dates are in different months
            $endDay = FormatDate('j.M', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $beginDay = FormatDate('j.M', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $arResult['DAYS'] = "$beginDay – $endDay";
            $arResult['MONTH'] = '';
        }
    }

    $res = CIBlockElement::GetList(
    	['ID' => 'ASC'],
    	['IBLOCK_ID' => PAGES_IBLOCK, 'ACTIVE' => 'Y', '=CODE' => 'about', 'PROPERTY_SUMMIT' => $arResult['ID']],
    	false,
    	false,
    	['ID', 'NAME', 'DETAIL_TEXT']
    );
    if ($override = $res->Fetch()) {
    	$arResult['NAME'] = $override['NAME'];
    	$arResult['~DETAIL_TEXT'] = $override['DETAIL_TEXT'];
    }
?>