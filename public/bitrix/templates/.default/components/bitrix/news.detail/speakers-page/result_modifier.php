<?
    $arResult['DAY'] = FormatDate('j', MakeTimeStamp($item['ACTIVE_FROM'], "DD.MM.YYYY HH:MI:SS"));
    $arResult['DATE'] = FormatDate('F, Y', MakeTimeStamp($item['ACTIVE_FROM'], "DD.MM.YYYY HH:MI:SS"));
?>