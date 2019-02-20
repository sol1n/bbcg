<div class="wrapper m-t-md m-b-md">
    <? if ($arResult['ITEMS']): ?>
        <div class="row">
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <div class="col-xs-6 col-sm-4 col-md-3 m-b-md">
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
    <? else: ?>
        <center style="margin: 150px 0">По вашему запросу ничего не найдено</center>
    <? endif ?>
</div>
<?=$arResult['NAV_STRING']?>
