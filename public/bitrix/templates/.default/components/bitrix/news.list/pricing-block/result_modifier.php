<?
    if ($arParams['EARLY_REGISTRATION']) {
        $arResult['EARLY_REGISTRATION'] = FormatDate('j F', MakeTimeStamp($arParams['EARLY_REGISTRATION'], "DD.MM.YYYY HH:MI:SS"));
    } else {
        $arResult['EARLY_REGISTRATION'] = null;
    }
?>