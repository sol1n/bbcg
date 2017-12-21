<?
    $arResult['DAY'] = FormatDate('j', MakeTimeStamp($item['ACTIVE_FROM'], "DD.MM.YYYY HH:MI:SS"));
    $arResult['DATE'] = FormatDate('F, Y', MakeTimeStamp($item['ACTIVE_FROM'], "DD.MM.YYYY HH:MI:SS"));

    CModule::IncludeModule('iblock');

    $selected = ['ID', 'NAME', 'PROPERTY_BEGIN', 'PROPERTY_AREA.NAME', 'PROPERTY_SUMMIT.CODE'];
    $res = CIBlockElement::GetList(['PROPERTY_BEGIN' => 'DESC'], ['IBLOCK_ID' => EVENTS_IBLOCK, 'PROPERTY_SPEAKERS' => $arResult['ID']], false, false, $selected);
    while ($event = $res->Fetch()) {
    	$event['DETAIL_PAGE_URL'] = '/' . $event['PROPERTY_SUMMIT_CODE'] . '/events/' . $event['ID'] . '/';
    	$event['DATE'] = FormatDate('j F, h:i', MakeTimeStamp($event['PROPERTY_BEGIN_VALUE'], "DD.MM.YYYY HH:MI:SS"));
    	$arResult['EVENTS'][] = $event;
    }
?>