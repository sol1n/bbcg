<? $last = count($arResult) ? count($arResult) - 1 : 0; ?>
<? foreach($arResult as $k => $item): ?>
	<a href="<?=$item["LINK"]?>">
        <?=$item["TEXT"]?>
    </a>
    <? if ($k != $last): ?><br/><? endif ?>
<? endforeach ?>