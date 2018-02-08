<?
    CModule::IncludeModule('iblock');

    $summits = [];
    foreach ($arResult['ITEMS'] as $item) {
        $summits[$item['PROPERTIES']['SUMMIT']['VALUE']] = true;
    }
    $summits = array_keys($summits);

    $selected = ['ID', 'NAME', 'DETAIL_PAGE_URL', 'PROPERTY_COLOR', 'PREVIEW_TEXT', 'PROPERTY_LOGO'];
    $res = CIBlockElement::GetList(['ID' => 'ASC'], ['IBLOCK_ID' => SUMMITS_IBLOCK, 'ID' => $summits], false, false, $selected);
    $summits = [];
    while ($summit = $res->GetNext()) {
        $summits[$summit['ID']] = [
            'ID' => $summit['ID'],
            'NAME' => $summit['NAME'],
            'PREVIEW_TEXT' => $summit['PREVIEW_TEXT'],
            'COLOR' => $summit['PROPERTY_COLOR_VALUE'],
            'LOGO' => CFile::GetPath($summit['PROPERTY_LOGO_VALUE']),
            'DETAIL_PAGE_URL' => $summit['DETAIL_PAGE_URL']
        ];
    }

    foreach ($arResult['ITEMS'] as $k => $item) {
        $index = $item['PROPERTIES']['SUMMIT']['VALUE'];
        $arResult['ITEMS'][$k]['SUMMIT'] = $summits[$index];

        $end = FormatDate('j', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        $begin = FormatDate('j', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

        if ($end == $begin) {
            $duration = FormatDate('j F', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        } else {
            $duration = "$begin - $end " . FormatDate('F', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        }

        $arResult['ITEMS'][$k]['DURATION'] = $duration;
    }
?>