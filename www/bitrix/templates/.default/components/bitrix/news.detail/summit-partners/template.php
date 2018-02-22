<div class="main-heading main-heading-<?=$arResult['COLOR']?>">
    <div class="wrapper">
        <h1 class="main-heading-title">Партнеры</h1>
    </div>
</div>

<div class="wrapper m-t-md m-b-md">
    <? foreach ($arResult['SECTIONS'] as $section): ?>
        <h2 class="text-center"><?=$section['NAME']?></h2>
        <div class="row">
            <? foreach ($section['ITEMS'] as $item): ?>
                <div class="col-xs-6 col-sm-4 col-md-3 m-b-md">
                    <? if ($item['PROPERTY_LINK_VALUE']): ?>
                        <a target="_blank" href="<?=$item['PROPERTY_LINK_VALUE']?>" class="partners-block-card ">
                            <img src="<?=$item['PREVIEW_PICTURE']?>" alt="<?=$item['NAME']?>">
                        </a>
                    <? else: ?>
                        <a class="partners-block-card ">
                            <img src="<?=$item['PREVIEW_PICTURE']?>" alt="<?=$item['NAME']?>">
                        </a>
                    <? endif ?>
                </div>
            <? endforeach ?>
        </div>
    <? endforeach ?>
</div>