<?
if (isset($_REQUEST['section']) && !empty($_REQUEST['section'])) {
	$parentSection = $_REQUEST['section'];	
} else {
	$summitsSectionCache = new CPHPCache();
	if($summitsSectionCache->InitCache(3600, 'summits-first-section', '/summits-first-section'))
	{
		extract($summitsSectionCache->GetVars());
	}
	elseif($summitsSectionCache->StartDataCache())
	{
		CModule::IncludeModule('iblock');
		$res = CIblockSection::GetList(
			['SORT' => 'ASC'],
			['IBLOCK_ID' => SUMMITS_IBLOCK, 'ACTIVE' => 'Y'],
			false,
			['ID', 'NAME', 'CODE']
		);
		$parentSection = $res->Fetch();
		if ($parentSection) {
			$parentSection = $parentSection['CODE'];
		}
		
		$summitsSectionCache->EndDataCache(['parentSection' => $parentSection]);
	}
}
?>