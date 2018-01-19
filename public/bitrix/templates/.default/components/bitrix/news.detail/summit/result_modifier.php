<?
	$end = FormatDate('d.m', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
    $begin = FormatDate('d.m', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
    
    if ($begin == $end) {
        //One-day summit
        $arResult['DURATION'] = FormatDate('j F', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
    } else {
        $end = FormatDate('m', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
        $begin = FormatDate('m', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

        if ($begin == $end) {
            //Start and end dates are in one month
            $endDay = FormatDate('j F', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $beginDay = FormatDate('j', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $arResult['DURATION'] = "$beginDay – $endDay";
        } else {
            //Start and end dates are in different months
            $endDay = FormatDate('j F', MakeTimeStamp($arResult["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $beginDay = FormatDate('j F', MakeTimeStamp($arResult["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $arResult['DURATION'] = "$beginDay – $endDay";
        }
    }

    if ($arParams['LANG'] == 'en') {
        $headers = [
        	'NEWS_TITLE' => [
                'title' => 'News',
                'subtitle' => 'Learn exclusive information about the market before appearing in the media',
                'link' => '/en/' . $arResult['CODE'] . '/news/'
            ],
        	'PROGRAM_TITLE' => [
                'title' => 'Sessions and master classes',
                'subtitle' => '20+ sessions and master classes',
                'link' => '/en/' . $arResult['CODE'] . '/events/'
            ], 
        	'SPEAKERS_TITLE' => [
                'title' => 'Speakers',
                'subtitle' => 'For registered users, the service of the questions is available to speakers with the possibility of receiving a response by mail or at a summit',
                'link' => '/en/' . $arResult['CODE'] . '/speakers/'
            ], 
        	'PARTNERS_TITLE' => [
                'title' => 'Parters',
                'subtitle' => 'Our partners &mdash; the largest world companies',
                'link' => '/en/' . $arResult['CODE'] . '/partners/'
            ]
        ];
    } else {
        $headers = [
            'NEWS_TITLE' => [
                'title' => 'Новости',
                'subtitle' => 'Узнайте эксклюзивную информацию о рынке до появления в СМИ',
                'link' => '/' . $arResult['CODE'] . '/news/'
            ],
            'PROGRAM_TITLE' => [
                'title' => 'Сессии и мастер-классы',
                'subtitle' => '20+ сессий и мастер-классов',
                'link' => '/' . $arResult['CODE'] . '/events/'
            ], 
            'SPEAKERS_TITLE' => [
                'title' => 'Спикеры',
                'subtitle' => 'Для зарегистрированных пользователей доступен сервис вопросов спикерам с возможностью получить ответ по почте или на саммите',
                'link' => '/' . $arResult['CODE'] . '/speakers/'
            ], 
            'PARTNERS_TITLE' => [
                'title' => 'Партнеры',
                'subtitle' => 'Наши партнеры &mdash; крупнейшие мировые компании',
                'link' => '/' . $arResult['CODE'] . '/partners/'
            ]
        ];
    }


    foreach ($headers as $key => $default) {
    	if (!empty($arResult['PROPERTIES'][$key]['VALUE'])) {
    		$arResult[$key] = [
    			'title' => $arResult['PROPERTIES'][$key]['VALUE'],
    			'subtitle' => $arResult['PROPERTIES'][$key]['DESCRIPTION'],
                'link' => $default['link']
    		];
    	} else {
    		$arResult[$key] = $default;
    	}
    }

    CModule::IncludeModule('iblock');
    $res = CIBlockElement::GetList(
        ['SORT' => 'ASC'],
        ['IBLOCK_ID' => CONTACTS_IBLOCK, 'ACTIVE' => 'Y', 'PROPERTY_SUMMIT' => $arResult['ID']],
        false,
        false,
        ['ID', 'NAME', 'PROPERTY_FIO', 'PREVIEW_PICTURE']
    );
    if ($contact = $res->Fetch()) {
        $arResult['CONTACT'] = $contact;
    } else {
        $arResult['CONTACT'] = null;
    }
?>