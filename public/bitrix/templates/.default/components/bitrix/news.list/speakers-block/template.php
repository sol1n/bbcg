<section class="speakers-block speakers-block-downarrow">
    <div class="wrapper">
        <div class="speakers-block-header">
            <div class="speakers-block-header-left">
                <div class="speakers-block-title">
                    <?=$arParams['TITLE']?>
                </div>
                <div class="speakers-block-subtitle">
                    <?=$arParams['SUBTITLE']?>
                </div>
            </div>
            <div class="speakers-block-header-right">
                <a href="/speakers/" class="no-wrap">
                    Все спикеры
                </a>
                <div class="speakers-block-header-arrows"></div>
            </div>
        </div>

        <div class="speakers-block-slider js-speakers-slider">
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <div class="speakers-block-slider-item">
                    <a 
                        href="<?=$item['DETAIL_PAGE_URL']?>" 
                        class="speakers-block-card" 
                        data-side-modal 
                        data-side-modal-url="/api/speakers/element/?id=<?=$item['ID']?>&lang=ru"
                        data-side-modal-class="side-modal-wide side-modal-speaker"
                    >
                        <div class="speakers-block-card-photo">
                            <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">

                            <? if ($item['PROPERTIES']['LOGO']['VALUE']): ?>
                                <? $logo = CFile::GetPath($item['PROPERTIES']['LOGO']['VALUE']); ?>
                                <div class="speakers-block-card-logo">
                                    <img src="<?=$logo?>" alt="<?=$item['PROPERTIES']['LOGO']['DESCRIPTION']?>">
                                </div>
                            <? endif ?>
                        </div>
                        <div class="speakers-block-card-desc">
                            <div class="speakers-block-card-name">
                                <?=$item['NAME']?>
                            </div>
                            <div class="speakers-block-card-title">
                                <?=$item['~PREVIEW_TEXT']?>
                            </div>
                        </div>
                    </a>
                </div>
            <? endforeach ?>
        </div>

        <div class="speakers-block-compact">
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <div class="speakers-block-card">
                    <a 
                        href="<?=$item['DETAIL_PAGE_URL']?>" 
                        class="speakers-block-card-photo" 
                        data-side-modal 
                        data-side-modal-url="/api/speakers/element/?id=<?=$item['ID']?>&lang=ru"
                        data-side-modal-class="side-modal-wide side-modal-speaker"
                    >
                        <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">

                        <? if ($item['PROPERTIES']['LOGO']['VALUE']): ?>
                            <? $logo = CFile::GetPath($item['PROPERTIES']['LOGO']['VALUE']); ?>
                            <div class="speakers-block-card-logo">
                                <img src="<?=$logo?>" alt="<?=$item['PROPERTIES']['LOGO']['DESCRIPTION']?>">
                            </div>
                        <? endif ?>
                    </a>
                    <div class="speakers-block-card-desc">
                        <a 
                            href="<?=$item['DETAIL_PAGE_URL']?>" 
                            class="speakers-block-card-name"
                            data-side-modal 
                            data-side-modal-url="/api/speakers/element/?id=<?=$item['ID']?>&lang=ru"
                            data-side-modal-class="side-modal-wide side-modal-speaker"
                        >
                            <?=$item['NAME']?>
                        </a>
                        <div class="speakers-block-card-title">
                            <?=$item['~PREVIEW_TEXT']?>
                        </div>
                    </div>
                </div>
            <? endforeach ?>
        </div>
    </div>
</section>