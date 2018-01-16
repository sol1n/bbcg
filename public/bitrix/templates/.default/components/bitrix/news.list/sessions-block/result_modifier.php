<?
    define('PREVIEW_LENGTH', 180);
    CModule::IncludeModule('iblock');

    $tags = [];
    $res = CIBlockElement::GetList(['ID' => 'DESC'], ['IBLOCK_ID' => TAGS_IBLOCK, 'ACTIVE' => 'Y'], false, false, ['ID', 'NAME']);
    while ($tag = $res->Fetch()) {
        $tags[$tag['ID']] = $tag['NAME'];
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

    $res = CIBlockElement::GetList(['ID' => 'DESC'], ['IBLOCK_ID' => SPEAKERS_IBLOCK, 'ID' => array_keys($speakers)], false, false, ['ID', 'NAME', 'PREVIEW_TEXT']);
    while ($speaker = $res->Fetch()) {
        $speakers[$speaker['ID']] = [
            'NAME' => $speaker['NAME'],
            'PREVIEW_TEXT' => $speaker['PREVIEW_TEXT']
        ];
    }

    foreach ($arResult['ITEMS'] as $k => $item) {
        if (isset($item['PROPERTIES']['CARD_SPEAKER']['VALUE'])) {
            $index = $item['PROPERTIES']['CARD_SPEAKER']['VALUE'];
            if (isset($speakers[$index])) {
                $arResult['ITEMS'][$k]['SPEAKER'] = $speakers[$index];
            }
        }

        if (mb_strlen($item['PREVIEW_TEXT']) > PREVIEW_LENGTH) {
            $arResult['ITEMS'][$k]['PREVIEW_TEXT'] = mb_substr($item['PREVIEW_TEXT'], 0, PREVIEW_LENGTH) . '…';
        }
    }
?>