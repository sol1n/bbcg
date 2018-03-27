<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

CModule::IncludeModule('iblock');

if (isset($_GET['code']) && !empty($_GET['code'])) {
	$code = $_GET['code'];
	if (mb_strpos($code, '-') !== false) {
		$array = explode('-', $code);
		if (is_array($array) && is_numeric($array[count($array) - 1])) {
			unset($array[count($array) - 1]);
			$code = implode('-', $array);
		}
	}

	$res = CIblockElement::GetList(
		['ID' => 'ASC'],
		['IBLOCK_ID' => SUMMITS_IBLOCK, 'CODE' => $code, 'ACTIVE' => 'Y'],
		false,
		false,
		['ID', 'NAME', 'CODE']
	);
	$summit = $res->Fetch();
	if ($summit) {
		LocalRedirect('/en/' . $summit['CODE'] . '/');
	} else {
		LocalRedirect('/en/');	
	}
} else {
	LocalRedirect('/en/');
}

?>