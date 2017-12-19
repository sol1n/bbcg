<section class="events-block">
    <div class="events-block-slider">
        <div class="events-block-slider-arrows"></div>
        <div class="events-block-slider-row js-events-slider">
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <div class="events-block-slider-item">
                    <div class="events-block-item events-block-item-<?=$item['SUMMIT']['COLOR']?>">
                        <div class="events-block-item-header" style="background-image: url('<?=$item['PREVIEW_PICTURE']['SRC']?>');">
                            <a href="<?=$item['DETAIL_PAGE_URL']?>" class="events-block-item-border">
                                <div class="events-block-item-name">
                                    <?=$item['NAME']?>
                                </div>
                                <div class="events-block-item-date">
                                    <?=$item['DURATION']?>
                                </div>
                            </a>
                        </div>
                        <a href="<?=$item['SUMMIT']['DETAIL_PAGE_URL']?>" class="events-block-item-footer">
                            <div class="events-block-item-logo">
                                <img src="<?=$item['SUMMIT']['LOGO']?>" alt="<?=$item['SUMMIT']['NAME']?>">
                            </div>
                            <div class="events-block-item-title">
                                <?=$item['SUMMIT']['NAME']?>
                            </div>
                            <div class="events-block-item-desc">
                                <?=$item['SUMMIT']['PREVIEW_TEXT']?>
                            </div>
                            <div class="events-block-item-readmore">
                                <img src="/assets/images/icons/icon-event-readmore-white.svg" alt="&rarr;">
                            </div>
                        </a>
                    </div>
                </div>
            <? endforeach ?>
        </div>
    </div>
</section>