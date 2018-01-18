<? 
    use \Bitrix\Main\Localization\Loc;
?>
<section id="academy-programm" class="programs-block p-b-xl">
    <div class="wrapper">
        <div class="programs-block-title">
            <?=$arParams['TITLE']?>
        </div>
        <div class="programs-block-subtitle">
            <?=$arParams['SUBTITLE']?>
        </div>

        <div class="programs-block-cards m-t-md">
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <div class="programs-block-cards-item">
                    <a href="#" class="programs-block-card">
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
    </div>
</section>