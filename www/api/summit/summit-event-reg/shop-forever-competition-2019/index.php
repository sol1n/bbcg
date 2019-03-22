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

if ($_POST['id'] && $_POST['fullname'] && $_POST['email'] && $_POST['phone'] && $_POST['position'] && $_POST['captain'] && $_POST['g-token'])
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
        $page = isset($_REQUEST['from']) ? $_REQUEST['from'] : '';

        CModule::IncludeModule('iblock');

        $arFilter = Array('IBLOCK_ID'=>SUMMIT_EVENTS_REQEST_IBLOCK, 'ACTIVE'=>'Y', 'ID'=>$_POST['id']);
        $arSelect = array("UF_*");
        $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true, $arSelect);
        if($ar_event_result = $db_list->GetNext()){
            $ar_section = $ar_event_result;
        }

        $el = new CIblockElement;
        $result = $el->Add([
            'IBLOCK_ID' => SUMMIT_EVENTS_REQEST_IBLOCK,
            'IBLOCK_SECTION_ID' => $_POST['id'],
            'NAME' => 'Заявка на участие',
            'PROPERTY_VALUES' => [
                'FULLNAME' => $_REQUEST['fullname'],
                'EMAIL' => $_REQUEST['email'],
                'PHONE' => $_REQUEST['phone'],
                'POSITION' => $_REQUEST['position'],
                'CAPTAIN' => $_REQUEST['captain'],
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
            'EVENT'    => $ar_section['NAME'],
            'FULLNAME' => $_REQUEST['fullname'],
            'EMAIL' => $_REQUEST['email'],
            'PHONE' => $_REQUEST['phone'],
            'POSITION' => $_REQUEST['position'],
            'CAPTAIN' => $_REQUEST['captain'],
        ];
        $result = sendEmail($ar_section['UF_EMAIL'], 'Заявка на сайте', 'shop-forever-competition-2019/administration', $data, [], ['dr.nightingale@mail.ru']);
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
