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
    'retail-academy' => 'Академия ритейла',
    'contacts' => 'Контакты'
];

if ($_POST['name'] && $_POST['surname'] && $_POST['phone'] && $_POST['email'] && $_POST['company'] && $_POST['title'] && $_POST['g-token'])
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

        //find selected cource
        $program = '';
        if (isset($_REQUEST['program']) && is_numeric($_REQUEST['program'])) {

            $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_*");
            $arFilter = Array("IBLOCK_ID"=>COURCES_IBLOCK, "ID"=> $_REQUEST['program'], "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
            while($ob = $res->GetNextElement()){
                $arProgram['FIELDS'] = $ob->GetFields();
                $arProgram['PROPERTIES'] = $ob->GetProperties();
            }

            $end = FormatDate('d.m', MakeTimeStamp($arProgram["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
            $begin = FormatDate('d.m', MakeTimeStamp($arProgram["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

            if ($begin == $end) {
                //One-day course
                $day = FormatDate('j', MakeTimeStamp($arProgram["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                $month = mb_strtolower(FormatDate('F', MakeTimeStamp($arProgram["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS")));
                $year = mb_strtolower(FormatDate('Y', MakeTimeStamp($arProgram["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS")));
                $format_date = ' ('.$day.' '.$month.' '.$year.')';
            } else {
                $end = FormatDate('m', MakeTimeStamp($arProgram["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                $begin = FormatDate('m', MakeTimeStamp($arProgram["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

                if ($begin == $end) {
                    //Start and end dates are in one month
                    $endDay = FormatDate('j', MakeTimeStamp($arProgram["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                    $beginDay = FormatDate('j', MakeTimeStamp($arProgram["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                    $days = "$beginDay – $endDay";
                    $month = mb_strtolower(FormatDate('F', MakeTimeStamp($arProgram["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS")));
                    $year = mb_strtolower(FormatDate('Y', MakeTimeStamp($arProgram["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS")));
                    $format_date = ' ('.$days.' '.$month.' '.$year.')';
                } else {
                    //Start and end dates are in different months
                    $endDay = FormatDate('j', MakeTimeStamp($arProgram["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                    $endMonth = FormatDate('F', MakeTimeStamp($arProgram["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                    $beginDay = FormatDate('j', MakeTimeStamp($arProgram["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                    $beginMonth = FormatDate('F', MakeTimeStamp($arProgram["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

                    $format_date = ' ('.$beginDay.' '.$beginMonth.' - '.$endDay.' '.$endMonth.' '.$year.')';
                }
            }
        }
        $cource = $arProgram['FIELDS']['NAME'].$format_date;

        $el = new CIblockElement;
        $result = $el->Add([
            'IBLOCK_ID' => ACADEMY_REQUESTS_IBLOCK,
            'NAME' => 'Заявка на участие',
            'PROPERTY_VALUES' => [
                'EMAIL' => $_REQUEST['email'],
                'PHONE' => $_REQUEST['phone'],
                'NAME' => $_REQUEST['name'],
                'LAST_NAME' => $_REQUEST['surname'],
                'POSITION' => $_REQUEST['title'],
                'COMPANY' => $_REQUEST['company'],
                'PROGRAM' => $cource
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
            'name' => $_REQUEST['name'],
            'surname' => $_REQUEST['surname'],
            'email' => $_REQUEST['email'],
            'phone' => $_REQUEST['phone'],
            'company' => $_REQUEST['company'],
            'position' => $_REQUEST['title'],
            'program' => $cource
        ];
        $result = sendEmail(RETAIL_EMAIL, 'Заявка на сайте', 'academy/administration', $data, [], ['sol1n@mail.ru', 'dr.nightingale@mail.ru']);
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
