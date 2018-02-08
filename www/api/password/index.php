<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-type:application/json;charset=utf-8');

if ($_REQUEST['lang'] == 'en')
{
    $messages = [
        'error' => 'The password you entered does not match the confirmation',
        'success' => "Password successfully changed",
    ];
}
else
{
    $messages = [
        'error' => 'Введенный пароль не совпадает с подтверждением',
        'success' => "Пароль успешно изменен",
    ];
}

if ($USER->IsAuthorized()) {
    if (isset($_REQUEST['new_password']) && !empty($_REQUEST['new_password']) && $_REQUEST['new_password'] == $_REQUEST['new_password2']) {
        $USER->Update($USER->GetID(), ["PASSWORD" => $_REQUEST['new_password']]);
        echo json_encode([
            'success' => true,
            'message' => $messages['success']
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => $messages['error']
        ]);
    }
} else {
    CHTTP::SetStatus('403');
}

?>