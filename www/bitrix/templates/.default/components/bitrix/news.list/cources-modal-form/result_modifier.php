<?
    CModule::IncludeModule('iblock');

    if ($arParams['LANG'] == 'en') {
        $arResult['REGISTRATION_URL'] = '/api/academy/?lang=en';
    } else {
        $arResult['REGISTRATION_URL'] = '/api/academy/';
    }

    foreach ($arResult['ITEMS'] as $k => $item) {
        $arResult['ITEMS'][$k]['NAME'] = !empty($item['PROPERTIES']['EN_NAME']['VALUE']) ? $item['PROPERTIES']['EN_NAME']['VALUE'] : $item['NAME']; 
    }
?>