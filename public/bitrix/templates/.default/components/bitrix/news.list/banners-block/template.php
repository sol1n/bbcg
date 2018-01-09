<section class="events-block">
    <div class="events-block-slider">
        <div class="events-block-slider-arrows"></div>
        <div class="events-block-slider-row js-events-slider">
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <div class="events-block-slider-item">
                    <div class="events-block-item events-block-item-<?=$item['PROPERTIES']['COLOR']['VALUE']?>">
                        <div class="events-block-item-header" style="background-image: url('<?=$item['PREVIEW_PICTURE']['SRC']?>');">
                            <a 
                                target="_blank"
                                href="<?=$item['PROPERTIES']['LINK']['VALUE']?>" 
                                class="events-block-item-border"
                            >
                                <div class="events-block-item-name">
                                    <?=$item['PROPERTIES']['THEME']['VALUE']?>
                                </div>
                                <div class="events-block-item-date">
                                    <?=$item['PROPERTIES']['DURATION']['VALUE']?>
                                </div>
                            </a>
                        </div>
                        <a target="_blank" href="<?=$item['PROPERTIES']['LINK']['VALUE']?>" class="events-block-item-footer">
                            <? if ($item['PROPERTIES']['ICON']['VALUE']): ?>
                                <div class="events-block-item-logo">
                                    <? $logo = CFile::GetPath($item['PROPERTIES']['ICON']['VALUE']); ?>
                                    <img src="<?=$logo?>" alt="<?=$item['NAME']?>">
                                </div>
                            <? endif ?>
                            <div class="events-block-item-title">
                                <?=$item['NAME']?>
                            </div>
                            <div class="events-block-item-desc">
                                <?=$item['PREVIEW_TEXT']?>
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