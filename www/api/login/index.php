<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-type:application/json;charset=utf-8');

if ($_REQUEST['lang'] == 'en')
{
    $messages = [
        'error' => "Authorization error",
        'empty' => 'You did not fill out the required fields'
    ];
}
else
{
    $messages = [
        'error' => "Ошибка авторизации",
        'empty' => 'Вы не заполнили обязательные поля'
    ];
}

if ($_POST['login'] && $_POST['password'])
{
    $arAuthResult = $USER->Login($_REQUEST['login'], $_POST['password'], "Y");

    if ($arAuthResult['TYPE'] == 'ERROR')
    {
        echo json_encode([
            'success' => false,
            'message' => $messages['error']
        ]);
    }
    else{
        echo json_encode([
            'success' => true,
            'reload' => true
        ]);
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