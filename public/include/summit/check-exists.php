<?
	$summit = null;
	if ($code = $_REQUEST['summit']) {
		$summitCache = new CPHPCache();
		if($summitCache->InitCache(3600, $code, '/summit-exists-cache'))
		{
			extract($summitCache->GetVars());
		}
		elseif($summitCache->StartDataCache()) {
			CModule::IncludeModule('iblock');
			$res = CIBlockElement::GetList(
				['ID' => 'ASC'],
				['IBLOCK_ID' => SUMMITS_IBLOCK, 'ACTIVE' => 'Y', '=CODE' => $code],
				false,
				false,
				['ID', 'NAME']
			);
			$summit = $res->Fetch();
			if (! $summit) {
				$summit = null;
			}
			$summitCache->EndDataCache(['summit' => $summit]);
		}
	}
?>