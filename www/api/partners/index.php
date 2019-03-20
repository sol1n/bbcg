<?
define('STOP_STATISTICS', true);
define('PARTNERS_OFFER', '/upload/documents/partners/partnership_offer.pdf');
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-type:application/json;charset=utf-8');

if ($_REQUEST['lang'] == 'en')
{
    $messages = [
        'error' => "Request sending error. Please contact the site administration",
        'success' => 'Request successfully sended',
        'empty' => 'You did not fill out the required fields'
    ];
}
else
{
    $messages = [
        'error' => "Ошибка отправки запроса. Пожалуйста, свяжитесь с администрацией сайта",
        'success' => "Заявка успешно отправлена",
        'empty' => "Вы не заполнили обязательные поля"
    ];
}

$from = [
    'partners' => 'Партнерам',
];

if ($_POST['company'] && $_POST['fio'] && $_POST['email'] && $_POST['phone'] && $_POST['g-token'])
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
        $page = isset($_REQUEST['from']) && isset($from[$_REQUEST['from']]) ? $from[$_REQUEST['from']] : '';

        CModule::IncludeModule('iblock');

        $el = new CIblockElement;
        $result = $el->Add([
            'IBLOCK_ID' => PARTNERS_REQUESTS_IBLOCK,
            'NAME' => 'Заявка от партнера',
            'PREVIEW_TEXT' => $_REQUEST['company'],
            'DETAIL_TEXT' => $_REQUEST['fio'],
            'PROPERTY_VALUES' => [
                'PHONE' => $_REQUEST['phone'],
                'EMAIL' => $_REQUEST['email']
            ]
        ]);
        echo json_encode([
            'success' => true,
            'message' => $messages['success'],
            'requestId' => $result,
            'file' => PARTNERS_OFFER
        ]);

        if (function_exists('fastcgi_finish_request')) {
            fastcgi_finish_request();
        }

        $data = [
            'COMPANY' => $_REQUEST['company'],
            'FIO' => $_REQUEST['fio'],
            'EMAIL' => $_REQUEST['email'],
            'PHONE' => $_REQUEST['phone'],
        ];
        $result = sendEmail(PARTNERS_EMAIL, 'Заявка на сайте', 'partners/administration', $data, [], ['sol1n@mail.ru', 'dr.nightingale@mail.ru']);
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
