<?
	CModule::IncludeModule('iblock');

	$arResult['COLOR'] = isset($arResult['PROPERTIES']['COLOR']['VALUE']) ? $arResult['PROPERTIES']['COLOR']['VALUE'] : 'blue';

	$end = FormatDate('d.m', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
    $begin = FormatDate('d.m', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
    
    if ($begin == $end) {
        //One-day summit
        $arResult['DAYS'] = FormatDate('j', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

        $arResult['MONTH'] = ($arParams['LANG'] == 'en') 
            ? mb_strtolower(PHPFormatDateTime($arResult["PROPERTIES"]['END']['VALUE'], 'F'))
            : mb_strtolower(FormatDate('F', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS")));
    } else {
        $end = FormatDate('m', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        $begin = FormatDate('m', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

        if ($begin == $end) {
            //Start and end dates are in one month
            $endDay = FormatDate('j', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $beginDay = FormatDate('j', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $arResult['DAYS'] = "$beginDay – $endDay";
            $arResult['MONTH'] = ($arParams['LANG'] == 'en')
                ? mb_strtolower(PHPFormatDateTime($arResult["PROPERTIES"]['END']['VALUE'], 'F'))
                : mb_strtolower(FormatDate('F', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS")));
        } else {
            //Start and end dates are in different months
            $endDay = FormatDate('j.M', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $beginDay = FormatDate('j.M', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $arResult['DAYS'] = mb_strtolower("$beginDay – $endDay");
            $arResult['MONTH'] = '';
        }
    }

    $res = CIBlockElement::GetList(
    	['ID' => 'ASC'],
    	['IBLOCK_ID' => PAGES_IBLOCK, 'ACTIVE' => 'Y', '=CODE' => $arParams['PAGE_CODE'], 'PROPERTY_SUMMIT' => $arResult['ID']],
    	false,
    	false,
    	['ID', 'NAME', 'DETAIL_TEXT', 'PROPERTY_EN_NAME', 'PROPERTY_EN_DETAIL_TEXT']
    );
    if ($override = $res->Fetch()) {
    	$arResult['NAME'] = ($arParams['LANG'] == 'en' and !empty($override['PROPERTY_EN_NAME_VALUE'])) 
            ? $override['PROPERTY_EN_NAME_VALUE'] 
            : $override['NAME'];
        $arResult['~DETAIL_TEXT'] = ($arParams['LANG'] == 'en' and !empty($override['PROPERTY_EN_DETAIL_TEXT_VALUE'])) 
            ? $override['PROPERTY_EN_DETAIL_TEXT_VALUE']['TEXT']
            : $override['DETAIL_TEXT'];
    } else {
        if ($arParams['LANG'] == 'en' and isset($arResult['PROPERTIES']['EN_NAME']['VALUE']) and !empty($arResult['PROPERTIES']['EN_NAME']['VALUE'])) {
            $arResult['NAME'] = $arResult['PROPERTIES']['EN_NAME']['VALUE'];
        }
        if ($arParams['LANG'] == 'en' and isset($arResult['PROPERTIES']['EN_DETAIL_TEXT']['~VALUE']['TEXT']) and !empty($arResult['PROPERTIES']['EN_DETAIL_TEXT']['~VALUE']['TEXT'])) {
            $arResult['~DETAIL_TEXT'] = $arResult['PROPERTIES']['EN_DETAIL_TEXT']['~VALUE']['TEXT'];
        }
    }
?>