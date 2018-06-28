<? 
    use \Bitrix\Main\Localization\Loc;
?>
    <div class="wrapper">
        <h3 class="programs-block-title">
            <?=$arParams['NAME']?>
        </h3>
        <div class="programs-block-cards m-t-md">
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <? $hot = $item['PROPERTIES']['HOT']['VALUE'] ? 'programs-block-card-hot' : '' ?>
                <div class="programs-block-cards-item">
                    <a 
                        href="#" 
                        class="programs-block-card <?=$hot?>"
                        data-side-modal 
                        data-side-modal-url="/api/cources/element/?id=<?=$item['ID']?>&lang=<?=$arParams['LANG']?>"
                        data-side-modal-class="side-modal-wide side-modal-news"
                    >
                        <div class="programs-block-card-header">
                            <div class="programs-block-card-title">
                                <?=mb_strimwidth($item['NAME'], 0, 40, "…"); ?>
                            </div>
                            <div class="programs-block-card-date">
                                <div class="programs-block-card-date-day">
                                    <?=$item['DAYS']?>
                                </div>
                                <div class="programs-block-card-date-month">
                                    <?=$item['MONTH']?>
                                </div>
                            </div>
                        </div>
                        <div class="programs-block-card-desc">
                            <?=mb_strimwidth($item['~PREVIEW_TEXT'], 0, 80, "…"); ?>
                        </div>
                    </a>
                </div>
            <? endforeach ?>
        </div>

        <? if ($arParams['DESCRIPTION']): ?>
            <div class="programs-block-description">
                <?=htmlspecialchars_decode($arParams['DESCRIPTION'])?>
            </div>
        <? endif ?>
    </div>