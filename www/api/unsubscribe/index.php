<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-type:application/json;charset=utf-8');

if ($_REQUEST['lang'] == 'en')
{
    $messages = [
        'error' => "Request sending error. Please contact the site administration",
        'success' => 'We are very sorry that you decided not to read us anymore. You have successfully unsubscribed from the newsletter.',
    ];
}
else
{
    $messages = [
        'error' => "Ошибка отправки запроса. Пожалуйста, свяжитесь с администрацией сайта",
        'success' => "Нам очень жаль, что вы решили нас больше не читать. Вы успешно отписались от рассылки.",
    ];
}

if ($_GET['mid'])
{
    $email = md5(md5($email) . NOT_MAIL_SALT);

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

        $options = [
            "o_already" => "Уже посещал(а) мероприятие",
            "o_call" => "Звонок менеджера",
            "o_recommendation" => "По рекомендации друзей и коллег",
            "o_email" => "Email-рассылка", "o_facebook" => "Facebook",
            "o_advertising" => "Реклама",
            "o_massmedia" => "СМИ"
        ];

        if ($_POST['summit_reg_select'] == 'o_other') {
            $hear_about_us = $_POST['other'];
        } else {
            $hear_about_us = $options[$_POST['summit_reg_select']];
        };
        $summit = CIBlockElement::GetByID($_REQUEST['summit'])->Fetch();
        if ($summit) {
            $full_name = trim($_REQUEST['full_name']);
            $parts = explode(" ", $full_name, 3);
            $last_name = $parts[0];
            $first_name = $parts[1];
            $second_name = $parts[2];

            $el = new CIblockElement;
            $result = $el->Add([
                'IBLOCK_ID' => REQUESTS_IBLOCK,
                'NAME' => 'Заявка на участие',
                'PROPERTY_VALUES' => [
                    'EMAIL' => $_REQUEST['email'],
                    'PHONE' => $_REQUEST['phone'],
                    'NAME' => $first_name,
                    'LAST_NAME' => $last_name,
                    'SECOND_NAME' => $second_name,
                    'FULL_NAME' => $full_name,
                    'POSITION' => $_REQUEST['title'],
                    'COMPANY' => $_REQUEST['company'],
                    'SUMMIT' => $summit['ID'],
                    'PROMO_CODE' => $_REQUEST['promocode'],
                    'HEAR_ABOUT_US' => $hear_about_us
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
                'full_name' => $full_name,
                'email' => $_REQUEST['email'],
                'phone' => $_REQUEST['phone'],
                'company' => $_REQUEST['company'],
                'position' => $_REQUEST['title'],
                'summit' => $summit['NAME'],
                'promocode' => $_REQUEST['promocode'],
                'hear_about_us' => $hear_about_us
            ];
            $result = sendEmail(ADMINISTRATION_EMAIL, 'Заявка на сайте', 'summit/administration', $data, [], ['sol1n@mail.ru', 'dr.nightingale@mail.ru']);
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
