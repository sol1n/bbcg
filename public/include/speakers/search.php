<?
if ($_POST['search'])
{
	CModule::IncludeModule('search');
	CModule::IncludeModule('iblock');

	$obSearch = new CSearch;
	$obSearch->Search(array(
		'QUERY' => $_REQUEST['search'],
		'SITE_ID' => LANG,
		'MODULE_ID' => 'iblock',
		'PARAM1' => 'content',
		'PARAM2' => SPEAKERS_IBLOCK
	));

	while($arResult = $obSearch->GetNext()){
	  $searchResults[] = $arResult['ITEM_ID'];
	}
}
?>