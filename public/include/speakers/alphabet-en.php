<?
$speakersCache = new CPHPCache();
if($speakersCache->InitCache(3600, 'speakers-alphabet-en', '/speakers-alphabet-en'))
{
	extract($speakersCache->GetVars());
}
elseif($speakersCache->StartDataCache())
{
	$result = [];
	CModule::IncludeModule('iblock');
	$alph = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

	foreach ($alph as $letter)
	{
		$res = CIBlockElement::GetList(
			['ID' => 'ASC'],
			['IBLOCK_ID' => SPEAKERS_IBLOCK, 'ACTIVE' => 'Y', 'PROPERTY_en_lastname' => "$letter%"],
			[]
		);
		if ($res){
			$result[$letter] = $res;
		}
	}

	$speakersCache->EndDataCache(['result' => $result]);
}
?>
<? if ($result): ?>
	<nav class="subnav">
        <div class="wrapper">
            <ul class="subnav-list">
            	<? if ($_REQUEST['letter']): ?>
	                <li class="subnav-list-item">
	                    <a href="/en/speakers/" class="subnav-link">
	                        <span>All</span>
	                    </a>
	                </li>
            	<? else: ?>
            		<li class="subnav-list-item active">
	                    <a href="/en/speakers/" class="subnav-link active">
	                        <span>All</span>
	                    </a>
	                </li>
        		<? endif ?>
                <? foreach ($result as $letter => $count): ?>
                	<? if ($_REQUEST['letter'] == $letter): ?>
                		<li class="subnav-list-item active">
		                    <a href="/en/speakers/?letter=<?=$letter?>" class="subnav-link active">
		                        <span><?php echo $letter; ?></span>
		                    </a>
		                </li>
                	<? else: ?>
                		<li class="subnav-list-item">
		                    <a href="/en/speakers/?letter=<?=$letter?>" class="subnav-link">
		                        <span><?php echo $letter; ?></span>
		                    </a>
		                </li>
                	<? endif ?>
                <? endforeach; ?>
            </ul>
        </div>
    </nav>
<? endif ?>