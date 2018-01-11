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

if ($_POST['name'] && $_POST['surname'] && $_POST['phone'] && $_POST['email'] && $_POST['company'] && $_POST['title'] && $_POST['summit'] && $_POST['g-token'])
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
        CModule::IncludeModule('iblock');

        $summit = CIBlockElement::GetByID($_REQUEST['summit'])->Fetch();
        if ($summit) {
            $el = new CIblockElement;
            $result = $el->Add([
                'IBLOCK_ID' => REQUESTS_IBLOCK,
                'NAME' => 'Заявка на участие',
                'PROPERTY_VALUES' => [
                    'EMAIL' => $_REQUEST['email'],
                    'PHONE' => $_REQUEST['phone'],
                    'NAME' => $_REQUEST['name'],
                    'LAST_NAME' => $_REQUEST['surname'],
                    'POSITION' => $_REQUEST['title'],
                    'COMPANY' => $_REQUEST['company'],
                    'SUMMIT' => $summit['ID']
                ]
            ]);
            echo json_encode([
                'success' => true,
                'message' => $messages['success'],
                'requestId' => $result
            ]);

            fastcgi_finish_request();
            $data = [
                'name' => $_REQUEST['name'],
                'surname' => $_REQUEST['surname'],
                'email' => $_REQUEST['email'],
                'phone' => $_REQUEST['phone'],
                'company' => $_REQUEST['company'],
                'position' => $_REQUEST['title'],
                'summit' => $summit['NAME']
            ];
            $result = sendEmail(ADMINISTRATION_EMAIL, 'Заявка на сайте', 'summit/administration', $data);
        } else {
            echo json_encode([
                'success' => false,
                'message' => $messages['summit']
            ]);
        }
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