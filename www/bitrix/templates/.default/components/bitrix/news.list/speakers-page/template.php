<div class="wrapper">
    <div class="row">
        <? foreach ($arResult['ITEMS'] as $item): ?>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <a
                    <? if ($arParams['OPEN_MODAL']): ?>
                        data-side-modal
                        data-side-modal-url="/api/speakers/element/?id=<?=$item['ID']?>&lang=<?=$arParams['LANG']?>"
                        data-side-modal-class="side-modal-wide side-modal-speaker"
                    <? endif ?>
                    href="<?=$item['DETAIL_PAGE_URL']?>"
                    class="speakers-block-card"
                >
                    <div class="speakers-block-card-photo">
                        <? if ($item['PREVIEW_PICTURE']): ?>
                            <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
                        <? else: ?>
                            <img src="/assets/images/no-speaker.png" alt="<?=$item['NAME']?>">
                        <? endif ?>
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
                            <?=$item['PREVIEW_TEXT']?>
                        </div>
                    </div>
                </a>
            </div>
        <? endforeach ?>
    </div>
    <?=$arResult['NAV_STRING']?>
</div>
