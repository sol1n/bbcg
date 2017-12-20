<?
$speakersCache = new CPHPCache();
if($speakersCache->InitCache(3600, 'speakers-alphabet-ru', '/speakers-alphabet-ru'))
{
	extract($speakersCache->GetVars());
}
elseif($speakersCache->StartDataCache())
{
	$result = [];
	CModule::IncludeModule('iblock');
	$alph = ['А', 'Б','В','Г','Д','Е','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ы','Э','Ю','Я'];

	foreach ($alph as $letter)
	{
		$res = CIBlockElement::GetList(
			['ID' => 'ASC'],
			['IBLOCK_ID' => SPEAKERS_IBLOCK, 'ACTIVE' => 'Y', 'PROPERTY_LASTNAME' => "$letter%"],
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
	                    <a href="/speakers/" class="subnav-link">
	                        <span>Все</span>
	                    </a>
	                </li>
            	<? else: ?>
            		<li class="subnav-list-item active">
	                    <a href="/speakers/" class="subnav-link active">
	                        <span>Все</span>
	                    </a>
	                </li>
        		<? endif ?>
                <? foreach ($result as $letter => $count): ?>
                	<? if ($_REQUEST['letter'] == $letter): ?>
                		<li class="subnav-list-item active">
		                    <a href="/speakers/?letter=<?=$letter?>" class="subnav-link active">
		                        <span><?php echo $letter; ?></span>
		                    </a>
		                </li>
                	<? else: ?>
                		<li class="subnav-list-item">
		                    <a href="/speakers/?letter=<?=$letter?>" class="subnav-link">
		                        <span><?php echo $letter; ?></span>
		                    </a>
		                </li>
                	<? endif ?>
                <? endforeach; ?>
            </ul>
        </div>
    </nav>
<? endif ?>