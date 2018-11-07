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

$from = [
    'rbr2018awards' => 'Премия RBR 2018',
];

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
        $page = isset($_REQUEST['from']) && isset($from[$_REQUEST['from']]) ? $from[$_REQUEST['from']] : '';

        CModule::IncludeModule('iblock');

        $nominations = [
            'team_z' => 'Команда Z',
            'open_mind' => 'Открытое сознание',
            'big_heart' => 'Большое сердце',
            'true_omni' => '«Тру омни»'
        ];

        $nomination = '';
        if (isset($_REQUEST['nomination'])) {
            $nomination = $nominations[$_REQUEST['nomination']];
        }

        $el = new CIblockElement;
        $result = $el->Add([
            'IBLOCK_ID' => RBR2018AWARDS_REQUESTS_IBLOCK,
            'NAME' => 'Заявка на участие в Премии RBR 2018',
            'PREVIEW_TEXT' => $_REQUEST['contacts'],
            'DETAIL_TEXT' => $_REQUEST['why_deserves'],
            'PROPERTY_VALUES' => [
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
            'NOMINATION' => $nomination,
            'COMPANY' => $_REQUEST['company'],
            'CONTACTS' => $_REQUEST['contacts'],
            'WHY_DESERVES' => $_REQUEST['why_deserves'],
        ];
        $result = sendEmail(RBR2018AWARDS_EMAIL, 'Заявка на сайте', 'rbr2018awards/administration', $data, [], ['sol1n@mail.ru', 'dr.nightingale@mail.ru']);
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
