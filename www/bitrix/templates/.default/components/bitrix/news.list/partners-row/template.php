<div class="row">
    <? foreach ($arResult['ITEMS'] as $item): ?>
        <div class="col-xs-12 col-sm-6 col-md-4 m-b-md">
            <? if ($item['PROPERTIES']['LINK']['VALUE']): ?>
                <a target="_blank" href="<?=$item['PROPERTIES']['LINK']['VALUE']?>" class="partners-block-card ">
                    <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
                </a>
            <? else: ?>
                <a class="partners-block-card ">
                    <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
                </a>
            <? endif ?>
        </div>
    <? endforeach ?>
</div>
