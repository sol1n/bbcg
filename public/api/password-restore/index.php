<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-type:application/json;charset=utf-8');

if (! function_exists('generateRandomString')) {
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if ($_REQUEST['lang'] == 'en')
{
    $messages = [
        'complete' => "<h1 class='message-modal-title'>Please, check the mail</h1><p class='text-center'>Data for recovery sent to your E-mail</p>",
        'empty' => 'You did not fill out the required fields',
        'theme' => 'Password restore',
        'template' => 'user/restore-en'
    ];
}
else
{
    $messages = [
        'complete' => "<h1 class='message-modal-title'>Пожалуйста, проверьте почту</h1><p class='text-center'>Даннные для восстановления отправленны на ваш E-mail</p>",
        'empty' => 'Вы не заполнили обязательные поля',
        'theme' => 'Восстановление пароля',
        'template' => 'user/restore'
    ];
}

if ($_POST['email'])
{
    $exists =  CUser::GetList(($by="ID"), ($order="desc"), ['ACTIVE' => 'Y', '=EMAIL' => $_POST['email']])->Fetch();

    echo json_encode([
        'success' => true,
        'message' => $messages['complete'],
    ]);

    fastcgi_finish_request();

    if ($exists) {
        $password = generateRandomString(6);

        $u = new CUser;
        $u->Update($exists['ID'], ['PASSWORD' => $password]);

        $data = [
            'name' => $exists['NAME'],
            'login' => $exists['LOGIN'],
            'password' => $password
        ];

        sendEmail($exists['EMAIL'], $messages['theme'], $messages['template'], $data, [], ['artem@webglyphs.ru']);
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