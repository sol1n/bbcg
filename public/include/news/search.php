<?
if ($_GET['search'])
{
	CModule::IncludeModule('search');
	CModule::IncludeModule('iblock');

	$obSearch = new CSearch;
	$obSearch->Search(array(
		'QUERY' => $_REQUEST['search'],
		'MODULE_ID' => 'iblock',
		'PARAM1' => 'content',
		'PARAM2' => NEWS_IBLOCK
	));

	while($arResult = $obSearch->GetNext()){
	  $searchResults[] = $arResult['ITEM_ID'];
	}
}
?>