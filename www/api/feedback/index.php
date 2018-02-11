<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-type:application/json;charset=utf-8');

if ($_REQUEST['lang'] == 'en')
{
    $messages = [
        'error' => "Message sending error. Please contact the site administration",
        'success' => 'Message successfully sended',
        'empty' => 'You did not fill out the required fields'
    ];
}
else
{
    $messages = [
        'error' => "Ошибка отправки сообщения. Пожалуйста, свяжитесь с администрацией сайта",
        'success' => "Сообщение успешно отправлено",
        'empty' => 'Вы не заполнили обязательные поля'
    ];
}

$from = [
    'retail-academy' => 'Академия ритейла',
    'contacts' => 'Контакты'
];

if ($_POST['email'] && $_POST['name'] && $_POST['message'] && $_POST['g-token'])
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
                'message' => $messages['error']
            ]);
        }
    } else {
        $page = isset($_REQUEST['from']) && isset($from[$_REQUEST['from']]) ? $from[$_REQUEST['from']] : ''; 

        CModule::IncludeModule('iblock');
        $el = new CIblockElement;
        $result = $el->Add([
            'IBLOCK_ID' => FEEDBACK_IBLOCK,
            'NAME' => $_REQUEST['name'],
            'PREVIEW_TEXT' => $_REQUEST['email'],
            'DETAIL_TEXT' => $_REQUEST['message'],
            'PROPERTY_VALUES' => [
                'SUMMIT' => $_REQUEST['summit'],
                'PAGE' => $page
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

        if (isset($_REQUEST['summit']) && !empty($_REQUEST['summit'])) {
            $summit = CIBlockElement::GetByID($_REQUEST['summit'])->Fetch();
        } else {
            $summit = null;
        }

        $data = [
            'name' => $_REQUEST['name'],
            'email' => $_REQUEST['email'],
            'message' => $_REQUEST['message'],
            'summit' => is_null($summit) ? '' : $summit['NAME'],
            'page' => $page
        ];
        
        $result = sendEmail(ADMINISTRATION_EMAIL, 'Сообщение на сайте', 'feedback/administration', $data, [], ['sol1n@mail.ru']);
    }
}
else
{  
    echo json_encode([
        'success' => false,
        'message' => $messages['empty']
    ]);
}
?>