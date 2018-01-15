<?
    if ($arParams['LANG'] == 'en') {
        $arResult['INDEX_PAGE_URL'] = '/en/partners/';
    } else {
        $arResult['INDEX_PAGE_URL'] = '/partners/';
    }

    foreach ($arResult['ITEMS'] as $k => $item) {
        if ($arParams['LANG'] == 'en') {
            $arResult['ITEMS'][$k]['DETAIL_PAGE_URL'] = '/en' . $arResult['ITEMS'][$k]['DETAIL_PAGE_URL'];
            $arResult['ITEMS'][$k]['NAME'] = !empty($item['PROPERTIES']['EN_NAME']['VALUE']) ? $item['PROPERTIES']['EN_NAME']['VALUE'] : $item['NAME']; 
            $arResult['ITEMS'][$k]['PREVIEW_TEXT'] = !empty($item['PROPERTIES']['EN_PREVIEW_TEXT']['VALUE']['TEXT']) ? $item['PROPERTIES']['EN_PREVIEW_TEXT']['VALUE']['TEXT'] : $item['PREVIEW_TEXT'];
            $arResult['ITEMS'][$k]['PREVIEW_PICTURE'] = !empty($item['PROPERTIES']['EN_PREVIEW_PICTURE']['VALUE'])
                ? ['SRC' => CFile::GetPath($item['PROPERTIES']['EN_PREVIEW_PICTURE']['VALUE'])]
                : $arResult['ITEMS'][$k]['PREVIEW_PICTURE'];
                
            foreach ($item['PROPERTIES'] as $code => $property) {
                if (isset($item['PROPERTIES']['EN_' . $code]['VALUE']) && !empty($item['PROPERTIES']['EN_' . $code]['VALUE'])) {
                    $arResult['ITEMS'][$k]['PROPERTIES'][$code]['VALUE'] = $item['PROPERTIES']['EN_' . $code]['VALUE'];
                }
            }
        }
    }
?>