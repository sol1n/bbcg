<nav class="header-global-menu">
    <ul>
      <? foreach($arResult as $item): ?>
      	<? if($item["SELECTED"]): ?>
      		<li class="active">
      			<a href="<?=$item["LINK"]?>">
                    <?=$item["TEXT"]?>
                </a>
      		</li>
      	<? else: ?>
      		<li>
      			<a href="<?=$item["LINK"]?>">
                    <?=$item["TEXT"]?>
                </a>
      		</li>
      	<? endif ?>
      <? endforeach ?>
    </ul>
</nav>

