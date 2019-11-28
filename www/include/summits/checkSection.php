<?
if (isset($_REQUEST['section']) && !empty($_REQUEST['section'])) {
	$parentSection = $_REQUEST['section'];
} else {
	$summitsSectionCache = new CPHPCache();
	if($summitsSectionCache->InitCache(3600, 'summits-first-section-new', '/summits-first-section-new'))
	{
		extract($summitsSectionCache->GetVars());
	}
	elseif($summitsSectionCache->StartDataCache())
	{
		CModule::IncludeModule('iblock');
		$res = CIblockSection::GetList(
			['SORT' => 'DESC'],
			['IBLOCK_ID' => SUMMITS_IBLOCK, 'ACTIVE' => 'Y'],
			false,
			['ID', 'NAME', 'CODE']
		);
		$parentSection = $res->Fetch();
		if ($parentSection) {
			$parentSection = $parentSection['CODE'];
		}
        /*
        //show current year if next year summit exist
        $currYear = date("Y");
        if ($parentSection > $currYear){
            $parentSection = $currYear;
        }*/

		$summitsSectionCache->EndDataCache(['parentSection' => $parentSection]);
	}
}
?>
