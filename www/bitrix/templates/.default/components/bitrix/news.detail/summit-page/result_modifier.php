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
    	['IBLOCK_ID' => PAGES_IBLOCK, 'ACTIVE' => 'Y', '=CODE' => $arParams['PAGE'], 'PROPERTY_SUMMIT' => $arResult['ID']],
    	false,
    	false,
    	['ID', 'NAME', 'DETAIL_TEXT', 'PROPERTY_EN_NAME', 'PROPERTY_EN_DETAIL_TEXT', 'PROPERTY_ACCESS_CODE']
    );
    if ($page = $res->Fetch()) {
        $arResult['PAGE_ID'] = $page['ID']; 
        $arResult['ACCESS_CODE'] = $page['PROPERTY_ACCESS_CODE_VALUE'];
    	$arResult['NAME'] = ($arParams['LANG'] == 'en' and !empty($page['PROPERTY_EN_NAME_VALUE'])) 
            ? $page['PROPERTY_EN_NAME_VALUE'] 
            : $page['NAME'];
    	$arResult['~DETAIL_TEXT'] = ($arParams['LANG'] == 'en' and !empty($page['PROPERTY_EN_DETAIL_TEXT_VALUE'])) 
            ? $page['PROPERTY_EN_DETAIL_TEXT_VALUE']['TEXT']
            : $page['DETAIL_TEXT'];
    }

	$arResult['SESSION_ACCESS'] = $arParams['SESSION_ACCESS'];
?>
