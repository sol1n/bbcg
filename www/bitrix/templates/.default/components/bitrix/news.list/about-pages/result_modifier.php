<?
    foreach ($arResult['ITEMS'] as $k => $item) {
        if ($arParams['LANG'] == 'en') {
            $arResult['ITEMS'][$k]['NAME'] = !empty($item['PROPERTIES']['EN_NAME']['VALUE']) ? $item['PROPERTIES']['EN_NAME']['VALUE'] : $item['NAME']; 
        }
    }
?>