<?
    foreach ($arResult['SECTIONS'] as $k => $section) {
        if ($section['SECTION_PAGE_URL'] == '/news/all/') {
            $arResult['SECTIONS'][$k]['SECTION_PAGE_URL'] = '/news/';
        }
    }
?>