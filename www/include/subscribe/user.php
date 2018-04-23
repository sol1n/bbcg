<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

$user = user();

if (!is_null($user)) {
    if (isset($user['UF_SUBSCRIBE']) and ($user['UF_SUBSCRIBE'] != 1)) {
        $u = new CUser;
        $u->Update($user['ID'], [
            'UF_SUBSCRIBE' => 1
        ]);
    }
}
?>

<div class="login-modal-title">
    Подписка на рассылку
</div>

<form class="login-modal-form" data-validate data-form-ajax data-form-ajax-overlay="#login-form-overlay">
    <div id="login-form-overlay" class="form-overlay"></div>

    <div class="form-group">
        <center>
            Вы были успешно подписаны на почтовую рассылку
        </center>
    </div>
</form>
