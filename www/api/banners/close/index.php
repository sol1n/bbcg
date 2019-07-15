<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-type:application/json;charset=utf-8');

// so not show banner 7 days
setcookie("h_banner","HIDE",time() + (3600 * 24 * 7),'/');

echo json_encode([
    'success' => true,
    'message' => "Баннер скрыт для текущего пользователя",
]);
?>
