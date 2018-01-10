<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

if ($USER->IsAuthorized()) {
    if (isset($_REQUEST['new_password']) && !empty($_REQUEST['new_password']) && $_REQUEST['new_password'] == $_REQUEST['new_password2']) {
        $USER->Update($USER->GetID(), ["PASSWORD" => $_REQUEST['new_password']]);
        $_SESSION['success'] = 'password changed';
    } else {
        $_SESSION['error'] = 'password change error';
    }
    LocalRedirect('/personal/password/');
} else {
    CHTTP::SetStatus('403');
}

?>