<? 
    use \Bitrix\Main\Localization\Loc;
?>
<? if ($arResult['ITEMS']): ?>
    <div class="row">
        <? foreach ($arResult['ITEMS'] as $item): ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div
                    class="speakers-block-card" 
                >
                    <div class="speakers-block-card-photo">
                        <? if ($item['PREVIEW_PICTURE']): ?>
                            <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
                        <? else: ?>
                            <img src="/assets/images/no-speaker.png" alt="<?=$item['NAME']?>">
                        <? endif ?>

                    </div>
                    <div class="speakers-block-card-desc">
                        <div class="speakers-block-card-name">
                            <?=$item['NAME']?>
                        </div>
                        <div class="speakers-block-card-title">
                            <i><?=$item['PROPERTIES']['POSITION']['VALUE']?></i><br/>
                            <a href="mailto:<?=$item['PROPERTIES']['EMAIL']['VALUE']?>"><?=$item['PROPERTIES']['EMAIL']['VALUE']?></a>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach ?>
    </div>

    <div class="speakers-block-compact">
        <? foreach ($arResult['ITEMS'] as $k => $item): ?>
            <? if ($k > 7) break; ?>
            <a
                href="#"
                class="speakers-block-card"
            >
                <div class="speakers-block-card-photo">
                    <? if ($item['PREVIEW_PICTURE']): ?>
                        <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
                    <? else: ?>
                        <img src="/assets/images/no-speaker.png" alt="<?=$item['NAME']?>">
                    <? endif ?>

                </div>
                <div class="speakers-block-card-desc">
                    <div class="speakers-block-card-name">
                        <?=$item['NAME']?>
                    </div>
                    <div class="speakers-block-card-title">
                        <div class="speakers-block-card-title">
                            <?=$item['PROPERTIES']['POSITION']['VALUE']?><br/>
                            <a href="mailto:<?=$item['PROPERTIES']['EMAIL']['VALUE']?>"><?=$item['PROPERTIES']['EMAIL']['VALUE']?></a>
                        </div>
                    </div>
                </div>
            </a>
        <? endforeach ?>
    </div>
<? endif ?>