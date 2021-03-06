<? 
    use \Bitrix\Main\Localization\Loc;
?>
<section class="programs-block programs-block-downarrow">
    <div class="wrapper">
        <div class="programs-block-header">
            <div class="programs-block-header-left">
                <h3 class="programs-block-title">
                    <?=$arParams['TITLE']?>
                </h3>
                <div class="programs-block-subtitle">
                    <?=$arParams['SUBTITLE']?>
                </div>
            </div>
            <div class="programs-block-header-right">
                <a href="<?=$arResult['INDEX_PAGE_URL']?>" class="no-wrap">
                    <?=Loc::GetMessage('ALL_PROGRAMS', [], $arParams['LANG'])?>
                </a>
                <div class="programs-block-header-arrows"></div>
            </div>
        </div>

        <div class="programs-block-slider js-programs-slider">
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <div class="programs-block-slider-item">
                    <div class="programs-block-cards-item">
                        <a 
                            href="<?=$item['DETAIL_PAGE_URL']?>" 
                            class="programs-block-card"
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
                </div>
            <? endforeach ?>
        </div>
    </div>
</section>