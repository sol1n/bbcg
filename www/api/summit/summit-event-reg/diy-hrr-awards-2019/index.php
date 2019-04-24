<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-type:application/json;charset=utf-8');

if ($_REQUEST['lang'] == 'en')
{
    $messages = [
        'summit' => "Summit is inactive. Please contact the site administration",
        'error' => "Request sending error. Please contact the site administration",
        'success' => 'Request successfully sended',
        'empty' => 'You did not fill out the required fields'
    ];
}
else
{
    $messages = [
        'summit' => "Запись на событие невозможна. Пожалуйста, свяжитесь с администрацией сайта",
        'error' => "Ошибка отправки запроса. Пожалуйста, свяжитесь с администрацией сайта",
        'success' => "Заявка успешно отправлена",
        'empty' => 'Вы не заполнили обязательные поля'
    ];
}

if ($_POST['nomination'] && $_POST['company'] && $_POST['contacts'] && $_POST['why_deserves'] && $_POST['g-token'])
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($curl, CURLOPT_FAILONERROR, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query([
        'secret' => RECAPTCHA_SECRET,
        'response' => $_POST['g-token'],
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ]));
    $result = curl_exec($curl);
    curl_close($curl);

    $parsed = json_decode($result);
    if (!isset($parsed->success) || !$parsed->success) {
        {
            echo json_encode([
                'success' => false,
                'message' => $messages['error'],
            ]);
        }
    } else {

        CModule::IncludeModule('iblock');

        $arFilter = Array('IBLOCK_ID'=>SUMMIT_EVENTS_REQEST_IBLOCK, 'ACTIVE'=>'Y', 'ID'=>$_POST['id']);
        $arSelect = array("UF_*");
        $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true, $arSelect);
        if($ar_event_result = $db_list->GetNext()){
            $ar_section = $ar_event_result;
        }

        $nominations = [
            'best_federal' => 'Лучшая федеральная сеть России по продажам товаров для ремонта и дома',
            'best_regional' => 'Лучшая региональная сеть России по продажам товаров для ремонта и дома',
            'year_supplier' => 'Поставщик года',
            'year_person' => 'Персона года',
            'bright_idea' => 'Яркая идея'
        ];

        $nomination = '';
        if (isset($_REQUEST['nomination'])) {
            $nomination = $nominations[$_REQUEST['nomination']];
        }

        $event = 'DIY&Household Retail Russia Award 2019';

        $el = new CIblockElement;
        $result = $el->Add([
            'IBLOCK_ID' => SUMMIT_EVENTS_REQEST_IBLOCK,
            'IBLOCK_SECTION_ID' => $_POST['id'],
            'NAME' => 'Заявка на участие в '.$event,
            'DETAIL_TEXT' => $_REQUEST['why_deserves'].' '.$ar_section['UF_EMAIL'],
            'PROPERTY_VALUES' => [
                'CONTACTS' => $_REQUEST['contacts'],
                'COMPANY' => $_REQUEST['company'],
                'NOMINATION' => $nomination
            ]
        ]);
        echo json_encode([
            'success' => true,
            'message' => $messages['success'],
            'requestId' => $result
        ]);

        if (function_exists('fastcgi_finish_request')) {
            fastcgi_finish_request();
        }

        $data = [
            'EVENT' => $event,
            'NOMINATION' => $nomination,
            'COMPANY' => $_REQUEST['company'],
            'CONTACTS' => $_REQUEST['contacts'],
            'WHY_DESERVES' => $_REQUEST['why_deserves'],
        ];
        $result = sendEmail($ar_section['UF_EMAIL'], 'Заявка на сайте', 'diy-hrr-awards-2019/administration', $data, [], ['dr.nightingale@mail.ru']);
    }
}
else
{
    echo json_encode([
        'success' => false,
        'message' => $messages['empty'],
    ]);
}
?>
