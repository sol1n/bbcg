<?
    CModule::IncludeModule('iblock');

    $sections = [];
    foreach ($arResult['SECTIONS'] as $section) {
        $sections[] = $section['ID'];
    }

    $selected = ['ID', 'IBLOCK_SECTION_ID', 'NAME', 'DETAIL_PAGE_URL', 'PROPERTY_LOGO', 'PROPERTY_BEGIN', 'PROPERTY_END'];
    $res = CIBlockElement::GetList(['SORT' => 'ASC'], ['IBLOCK_ID' => SUMMITS_IBLOCK, 'ACTIVE' => 'Y'], false, false, $selected);

    $elements = [];

    while ($element = $res->GetNext()) {

        $end = FormatDate('d.m', MakeTimeStamp($element["PROPERTY_END_VALUE"], "DD.MM.YYYY HH:MI:SS"));
        $begin = FormatDate('d.m', MakeTimeStamp($element["PROPERTY_BEGIN_VALUE"], "DD.MM.YYYY HH:MI:SS"));
        
        if ($begin == $end) {
            //One-day summit
            $duration = FormatDate('j F', MakeTimeStamp($element["PROPERTY_END_VALUE"], "DD.MM.YYYY HH:MI:SS"));
        } else {
            $end = FormatDate('m', MakeTimeStamp($element["PROPERTY_END_VALUE"], "DD.MM.YYYY HH:MI:SS"));
            $begin = FormatDate('m', MakeTimeStamp($element["PROPERTY_BEGIN_VALUE"], "DD.MM.YYYY HH:MI:SS"));

            if ($begin == $end) {
                //Start and end dates are in one month
                $endDay = FormatDate('j F', MakeTimeStamp($element["PROPERTY_END_VALUE"], "DD.MM.YYYY HH:MI:SS"));
                $beginDay = FormatDate('j', MakeTimeStamp($element["PROPERTY_BEGIN_VALUE"], "DD.MM.YYYY HH:MI:SS"));
                $duration = "$beginDay – $endDay";
            } else {
                //Start and end dates are in different months
                $endDay = FormatDate('j F', MakeTimeStamp($element["PROPERTY_END_VALUE"], "DD.MM.YYYY HH:MI:SS"));
                $beginDay = FormatDate('j F', MakeTimeStamp($element["PROPERTY_BEGIN_VALUE"], "DD.MM.YYYY HH:MI:SS"));
                $duration = "$beginDay – $endDay";
            }
        }

        $elements[$element['IBLOCK_SECTION_ID']][] = [
            'ID' => $element['ID'],
            'NAME' => $element['NAME'],
            'DURATION' => $duration,
            'DETAIL_PAGE_URL' => $element['DETAIL_PAGE_URL'],
            'LOGO' => CFile::GetPath($element['PROPERTY_LOGO_VALUE'])
        ];
    }

    foreach ($arResult['SECTIONS'] as $k => $section) {
        foreach ($elements as $index => $one) {
            if ($index == $section['ID']) {
                $arResult['SECTIONS'][$k]['ELEMENTS'] = $one;
                break;
            }
        }
    }
?>