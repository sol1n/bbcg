<?
    if ($arParams['LANG'] == 'en') {
        $arResult['INDEX_PAGE_URL'] = '/en/news/';
    } else {
        $arResult['INDEX_PAGE_URL'] = '/news/';
    }

    foreach ($arResult['ITEMS'] as $k => $item) {
        if ($arParams['LANG'] == 'en') {
            $arResult['ITEMS'][$k]['DETAIL_PAGE_URL'] = '/en' . $arResult['ITEMS'][$k]['DETAIL_PAGE_URL'];
            $arResult['ITEMS'][$k]['DATE'] = mb_strtolower(PHPFormatDateTime($item["ACTIVE_FROM"], "j F"));
            $arResult['ITEMS'][$k]['NAME'] = !empty($item['PROPERTIES']['EN_NAME']['VALUE']) ? $item['PROPERTIES']['EN_NAME']['VALUE'] : $item['NAME']; 
            $arResult['ITEMS'][$k]['PREVIEW_TEXT'] = !empty($item['PROPERTIES']['EN_PREVIEW_TEXT']['VALUE']['TEXT']) ? $item['PROPERTIES']['EN_PREVIEW_TEXT']['VALUE']['TEXT'] : $item['PREVIEW_TEXT'];
        } else {
            $arResult['ITEMS'][$k]['DATE'] = mb_strtolower(FormatDate('j F', MakeTimeStamp($item['ACTIVE_FROM'], "DD.MM.YYYY HH:MI:SS")));
        }
    }
?>