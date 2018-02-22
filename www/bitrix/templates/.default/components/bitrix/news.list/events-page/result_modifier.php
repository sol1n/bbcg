<?
    define('EVENTS_STEP', 10);
    CModule::IncludeModule('iblock');

    //Gets colors
    $tags = $colors = [];
    foreach ($arResult['ITEMS'] as $item) {
        if ($item['PROPERTIES']['TAG']['VALUE']) {
            $tags[$item['PROPERTIES']['TAG']['VALUE']] = true;
        }
    }
    if (count($tags)) {
        $res = CIBlockElement::GetList(
            ['ID' => 'ASC'],
            ['IBLOCK_ID' => TAGS_IBLOCK, 'ID' => array_keys($tags)],
            false,
            false,
            ['ID', 'NAME', 'PROPERTY_COLOR']
        );
        while ($tag = $res->Fetch()) {
            $colors[$tag['ID']] = $tag['PROPERTY_COLOR_VALUE'];
        }
    }

    //Collects speakers
    $speakers = [];
    foreach ($arResult['ITEMS'] as $item) {
        if (is_array($item['PROPERTIES']['SPEAKERS']['VALUE']) && count($item['PROPERTIES']['SPEAKERS']['VALUE'])) {
            foreach ($item['PROPERTIES']['SPEAKERS']['VALUE'] as $speaker) {
                $speakers[$speaker] = true;
            }
        }
    }
    $speakers = array_keys($speakers);
    $res = CIBlockElement::GetList(
        ['SORT' => 'ASC'],
        ['IBLOCK_ID' => SPEAKERS_IBLOCK, 'ID' => $speakers, 'ACTIVE' => 'Y'],
        false,
        false,
        ['ID', 'NAME', 'PREVIEW_TEXT']
    );
    $speakers = [];
    while ($speaker = $res->Fetch()) {
        $speakers[$speaker['ID']] = $speaker;
    }

    foreach ($arResult['ITEMS'] as $k => $item) {
        if (count($item['PROPERTIES']['THEMES']['VALUE'])) {
            foreach ($item['PROPERTIES']['THEMES']['VALUE'] as $index => $theme) {
                if (isset($item['PROPERTIES']['THEMES']['DESCRIPTION'][$index])) {
                    $speakerID = $item['PROPERTIES']['THEMES']['DESCRIPTION'][$index];
                    $arResult['ITEMS'][$k]['themes'][$speakerID] = $theme;
                }
            }
        }
    }

    //Gets areas
    $arResult['AREAS'] = $areaSequence = [];

    $res = CIblockElement::GetList(
        ['SORT' => 'ASC'],
        ['IBLOCK_ID' => AREAS_IBLOCK, 'ACTIVE' => 'Y'],
        false,
        false,
        ['ID', 'NAME']
    );

    while ($area = $res->Fetch())
    {
        if (empty($arResult['AREAS'])){
            $arResult['AREAS'][$area['ID']] = ['NAME' => $area['NAME'], 'ITEMS' => [], 'FIRST' => true];
        } else {
            $arResult['AREAS'][$area['ID']] = ['NAME' => $area['NAME'], 'ITEMS' => []];
        }

        $areaSequence[] = $area['ID'];
    }

    $arParams['CELL_WIDTH'] = 600;

    $arResult['DAY'] = FormatDate('j', MakeTimeStamp($arParams['DATE'], "DD.MM.YYYY"));
    $arResult['MONTH'] = FormatDate('F', MakeTimeStamp($arParams['DATE'], "DD.MM.YYYY"));

    //Sets first & last hours
    $arResult['FIRST_HOUR'] = 24;
    $arResult['LAST_HOUR'] = 0;
    foreach ($arResult['ITEMS'] as $item) {
        $timeBegin = new DateTime($item['PROPERTIES']['BEGIN']['VALUE']);
        $timeEnd = new DateTime($item['PROPERTIES']['END']['VALUE']);
        if ((integer) $timeBegin->format('G') < $arResult['FIRST_HOUR']) {
            $arResult['FIRST_HOUR'] = (integer) $timeBegin->format('G');
        }
        if ((integer) $timeEnd->format('G') > $arResult['LAST_HOUR']) {
            $arResult['LAST_HOUR'] = (integer) $timeEnd->format('G');
        }
    }

    //Generates left hours line
    $currentHour = $arResult['FIRST_HOUR'];
    $arResult['HOURS'] = [];
    do {
        $arResult['HOURS'][$currentHour] = [
            'steps' => []
        ];
        $minutes = '00';
        do {
            $arResult['HOURS'][$currentHour]['steps'][] = "$currentHour:$minutes";
            $minutes += EVENTS_STEP;
        } while ((integer) $minutes < 60);
        $currentHour++;
    } while ($currentHour < $arResult['LAST_HOUR'] && $currentHour < 24);

    //Sets additional fields for events & puts event into area pull
    foreach ($arResult['ITEMS'] as $item) {
        $begin = new DateTime($item['PROPERTIES']['BEGIN']['VALUE']);
        $item['begin'] = $begin->format('H:i');
        $end = new DateTime($item['PROPERTIES']['END']['VALUE']);
        $item['end'] = $end->format('H:i');

        $item['minutes'] = abs($end->getTimestamp() - $begin->getTimestamp()) / 60;

        if (is_array($item['PROPERTIES']['SPEAKERS']['VALUE']) && count($item['PROPERTIES']['SPEAKERS']['VALUE'])) {
            foreach ($item['PROPERTIES']['SPEAKERS']['VALUE'] as $speaker) {
                if (isset($speakers[$speaker])) {
                    $speakerElement = $speakers[$speaker];
                    if (isset($item['themes'][$speaker])) {
                        $speakerElement['theme'] = $item['themes'][$speaker];
                    }
                    $item['speakers'][] = $speakerElement;
                }
            }
        }

        if ($item['PROPERTIES']['TAG']['VALUE'] && isset($colors[$item['PROPERTIES']['TAG']['VALUE']])) {
            $item['color'] = $colors[$item['PROPERTIES']['TAG']['VALUE']];
        }

        if ($area = $item['PROPERTIES']['AREA']['VALUE'][0]) {

            foreach ($item['PROPERTIES']['AREA']['VALUE'] as $eventAreaId) {
                $arResult['AREAS'][$eventAreaId]['using'] = true;
            }

            if (count($item['PROPERTIES']['AREA']['VALUE']) > 1) {
                $areaIndex = 0;
                foreach ($areaSequence as $k => $v) {
                    if ($v == $area) {
                        $areaIndex = $k;
                    }
                }
                $eventWidht = 0;
                for ($j = $areaIndex; $j < count($areaSequence); $j++) {
                    if (in_array($areaSequence[$j], $item['PROPERTIES']['AREA']['VALUE'])) {
                        $eventWidht++;
                    }
                }
                $item['width'] = $eventWidht;
            }

            $areasPull = [];
            foreach ($item['PROPERTIES']['AREA']['VALUE'] as $area) {
                $areasPull[] = $arResult['AREAS'][$area]['NAME'];
            }
            $item['area'] = implode(', ', $areasPull);

            $area = $item['PROPERTIES']['AREA']['VALUE'][0];
            $arResult['AREAS'][$area]['ITEMS'][] = $item;
        } else {
            if ($item['speakers'] && count($item['speakers'])) {
                $speakersLocal = $item['speakers'];
                if ($item['PROPERTIES']['SPEAKERS_COLUMN']['VALUE'] == 'Y') {
                    $item['speakers'] = [];
                    $item['column-view'] = true;
                    foreach($speakersLocal as $speaker) {
                        $item['speakers'][] = $speaker;
                    }
                } else {
                    $item['speakers'] = [[],[],[]];
                    $item['column-view'] = false;
                    foreach($speakersLocal as $k => $speaker) {
                        $index = $k % 3;
                        $item['speakers'][$index][] = $speaker;
                    }
                }
            }
            $arResult['GLOBALS']['ITEMS'][] = $item;
        }

        $arResult['MOBILE_ITEMS'][] = $item;
    }

    //Generates an empty timeline
    $counter = 0;
    $arResult['TIMELINE'] = [];
    for ($i = $arResult['FIRST_HOUR']; $i <= $arResult['LAST_HOUR']; $i++) {
        $arResult['TIMELINE'][$counter++] = [];
    }

    //Fills the timeline with global events
    foreach ($arResult['GLOBALS']['ITEMS'] as $j => $item) {
        $begin = new DateTime($item['PROPERTIES']['BEGIN']['VALUE']);
        $end = new DateTime($item['PROPERTIES']['END']['VALUE']);

        $morning = new DateTime($arParams['DATE']);
        $morning->modify("+" . $arResult['FIRST_HOUR'] . " hours");
        $offset = $begin->format('i');
        $begin->modify('-' . $offset . ' minutes');

        $counter = 0;
        while ($morning < $begin)
        {
            $counter++;
            $morning->modify('+1 hour');
        }

        $arResult['TIMELINE'][$counter]['GLOBALS'][] = [
            'id' => $item['ID'],
            'name' => $item['NAME'],
            'speakers' => $item['speakers'],
            'description' => $item['PREVIEW_TEXT'],
            'duration' => $item['minutes'],
            'offset' => $offset,
            'begin' => $item['begin'],
            'end' => $item['end'],
            'url' => $item['DETAIL_PAGE_URL'],
            'width' => $item['width'],
            'color' => $item['color'],
            'open' => $item['PROPERTIES']['NOT_OPEN']['VALUE'] != 'Y',
            'subtitle' => $item['subtitle'],
            'column-view' => $item['column-view'],
        ];
    }

    //Fills the timeline with areas-based events
    foreach ($arResult['AREAS'] as $k => $area) {

        foreach ($area['ITEMS'] as $j => $item) {
            $begin = new DateTime($item['PROPERTIES']['BEGIN']['VALUE']);
            $end = new DateTime($item['PROPERTIES']['END']['VALUE']);

            $morning = new DateTime($arParams['DATE']);
            $morning->modify("+" . $arResult['FIRST_HOUR'] . " hours");
            $offset = $begin->format('i');
            $begin->modify('-' . $offset . ' minutes');

            $counter = 0;
            while ($morning < $begin)
            {
                $counter++;
                $morning->modify('+1 hour');
            }

            $arResult['TIMELINE'][$counter][$k][] = [
                'id' => $item['ID'],
                'name' => $item['NAME'],
                'speakers' => $item['speakers'],
                'description' => $item['PREVIEW_TEXT'],
                'duration' => $item['minutes'],
                'offset' => $offset,
                'begin' => $item['begin'],
                'end' => $item['end'],
                'url' => $item['DETAIL_PAGE_URL'],
                'width' => $item['width'],
                'color' => $item['color'],
                'open' => $item['PROPERTIES']['NOT_OPEN']['VALUE'] != 'Y',
                'subtitle' => $item['subtitle']
            ];
        }

        if (!count($area['ITEMS']) && !$area['using']) {
            unset($arResult['AREAS'][$k]);
        }
    }
?>