<?
    define('PREVIEW_LENGTH', 180);
    CModule::IncludeModule('iblock');

    $tags = [];
    if ($arParams['LANG'] == 'en') {
        $selectedFields = ['ID', 'NAME', 'PROPERTY_EN_NAME'];
    } else {
        $selectedFields = ['ID', 'NAME'];
    }
    $res = CIBlockElement::GetList(['ID' => 'DESC'], ['IBLOCK_ID' => TAGS_IBLOCK, 'ACTIVE' => 'Y'], false, false, $selectedFields);
    while ($tag = $res->Fetch()) {
        if ($arParams['LANG'] == 'en') {
            $tags[$tag['ID']] = !empty($tag['PROPERTY_EN_NAME_VALUE']) ? $tag['PROPERTY_EN_NAME_VALUE'] : $tag['NAME'];
        } else {
            $tags[$tag['ID']] = $tag['NAME'];
        }
    }

    $speakers = [];
    foreach ($arResult['ITEMS'] as $k => $item) {
        if ($item['PROPERTIES']['TAG']['VALUE'] && isset($tags[$item['PROPERTIES']['TAG']['VALUE']])) {
            $arResult['ITEMS'][$k]['TAG'] = $tags[$item['PROPERTIES']['TAG']['VALUE']];
        }

        if (isset($item['PROPERTIES']['CARD_SPEAKER']['VALUE'])) {
            $speakers[$item['PROPERTIES']['CARD_SPEAKER']['VALUE']] = true;
        } else {
            $arResult['ITEMS'][$k]['SPEAKER'] = false;
        }
    }

    if ($arParams['LANG'] == 'en') {
        $selectedFields = ['ID', 'NAME', 'PREVIEW_TEXT', 'PROPERTY_EN_NAME', 'PROPERTY_EN_PREVIEW_TEXT'];
    } else {
        $selectedFields = ['ID', 'NAME', 'PREVIEW_TEXT'];
    }
    $res = CIBlockElement::GetList(['ID' => 'DESC'], ['IBLOCK_ID' => SPEAKERS_IBLOCK, 'ID' => array_keys($speakers)], false, false, $selectedFields);
    while ($speaker = $res->Fetch()) {
        if ($arParams['LANG'] == 'en') {
            $speakers[$speaker['ID']] = [
                'NAME' => !empty($speaker['PROPERTY_EN_NAME_VALUE']) ? $speaker['PROPERTY_EN_NAME_VALUE'] : $speaker['NAME'],
                'PREVIEW_TEXT' => !empty($speaker['PROPERTY_EN_PREVIEW_TEXT_VALUE']) ? $speaker['PROPERTY_EN_PREVIEW_TEXT_VALUE']['TEXT'] : $speaker['PREVIEW_TEXT']
            ];
        } else {
            $speakers[$speaker['ID']] = [
                'NAME' => $speaker['NAME'],
                'PREVIEW_TEXT' => $speaker['PREVIEW_TEXT']
            ];
        }
    }

    foreach ($arResult['ITEMS'] as $k => $item) {
        if (isset($item['PROPERTIES']['CARD_SPEAKER']['VALUE'])) {
            $index = $item['PROPERTIES']['CARD_SPEAKER']['VALUE'];
            if ($index && isset($speakers[$index])) {
                $arResult['ITEMS'][$k]['SPEAKER'] = $speakers[$index];
            }
        }

        if ($arParams['LANG'] == 'en') {
            $arResult['ITEMS'][$k]['DATE'] = mb_strtolower(PHPFormatDateTime($item['PROPERTIES']['BEGIN']['VALUE'], 'j F'));
            $arResult['ITEMS'][$k]['DETAIL_PAGE_URL'] = '/en' . $arResult['ITEMS'][$k]['DETAIL_PAGE_URL'];
            $arResult['ITEMS'][$k]['NAME'] = !empty($item['PROPERTIES']['EN_NAME']['VALUE']) ? $item['PROPERTIES']['EN_NAME']['VALUE'] : $item['NAME']; 
            $arResult['ITEMS'][$k]['PREVIEW_TEXT'] = !empty($item['PROPERTIES']['EN_PREVIEW_TEXT']['VALUE']['TEXT']) ? $item['PROPERTIES']['EN_PREVIEW_TEXT']['VALUE']['TEXT'] : $item['PREVIEW_TEXT'];

            foreach ($item['PROPERTIES'] as $code => $property) {
                if (isset($item['PROPERTIES']['EN_' . $code]['VALUE']) && !empty($item['PROPERTIES']['EN_' . $code]['VALUE'])) {
                    $arResult['ITEMS'][$k]['PROPERTIES'][$code]['VALUE'] = $item['PROPERTIES']['EN_' . $code]['VALUE'];
                }
            }
        } else {
            $arResult['ITEMS'][$k]['DATE'] = mb_strtolower(FormatDate('j F', MakeTimeStamp($item['PROPERTIES']['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS")));
        }

        if (mb_strlen($item['PREVIEW_TEXT']) > PREVIEW_LENGTH) {
            $arResult['ITEMS'][$k]['PREVIEW_TEXT'] = mb_substr($item['PREVIEW_TEXT'], 0, PREVIEW_LENGTH) . '…';
        }

    }
?>