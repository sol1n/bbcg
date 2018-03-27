<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

CModule::IncludeModule('iblock');

if (isset($_GET['code']) && !empty($_GET['code'])) {
	$res = CIblockElement::GetList(
		['ID' => 'ASC'],
		['IBLOCK_ID' => SUMMITS_IBLOCK, 'CODE' => $_GET['code']],
		false,
		false,
		['ID', 'NAME', 'CODE']
	);
	$summit = $res->Fetch();
	if ($summit) {
		LocalRedirect('/' . $summit['CODE'] . '/');
	} else {
		LocalRedirect('/');	
	}
} else {
	LocalRedirect('/');
}

?>