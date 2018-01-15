<section class="summits-block summits-block-downarrow">
    <div class="wrapper">
        <div class="summits-block-header">
            <div class="summits-block-header-left">
                <div class="summits-block-title">
                    <?=$arParams['TITLE']?>
                </div>
                <div class="summits-block-subtitle">
                    <?=$arParams['SUBTITLE']?>
                </div>
            </div>
            <div class="summits-block-header-right">
                <div class="summits-block-header-year js-summits-slider-current-year">
                    <?=$arResult['SECTIONS'][0]['NAME']?>
                </div>
                <div class="summits-block-header-arrows"></div>
            </div>
        </div>

        <div class="summits-block-slider js-summits-slider">
            <? foreach ($arResult['SECTIONS'] as $year): ?>
                <div class="summits-block-slider-item" data-summits-year="<?=$year['CODE']?>">
                    <div class="summits-block-cards">
                        <div class="summits-block-cards-row">
                            <? foreach ($year['ELEMENTS'] as $summit): ?>
                                <div class="summits-block-cards-cell">
                                    <div class="summits-block-card">
                                        <a href="<?=$summit['DETAIL_PAGE_URL']?>" class="summits-block-card-image">
                                            <img src="<?=$summit['LOGO']?>" alt="<?=$summit['NAME']?>">
                                        </a>
                                        <div class="summits-block-card-date">
                                            <?=$summit['DURATION']?>
                                        </div>
                                    </div>
                                </div>
                            <? endforeach ?>
                        </div>
                    </div>
                </div>
            <? endforeach ?>
        </div>
    </div>
</section>