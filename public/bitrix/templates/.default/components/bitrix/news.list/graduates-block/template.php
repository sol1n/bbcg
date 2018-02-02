<? 
    use \Bitrix\Main\Localization\Loc;
?>
<? if ($arResult['ITEMS']): ?>
    <div class="h3 m-t-xl m-b-lg">
        <?=$arParams['TITLE']?>
    </div>

    <div class="row academy-speakers-block">
        <? foreach ($arResult['ITEMS'] as $item): ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a 
                    href="<?=$item['DETAIL_PAGE_URL']?>" 
                    class="speakers-block-card" 
                    data-side-modal 
                    data-side-modal-url="/api/graduates/element/?id=<?=$item['ID']?>&lang=<?=$arParams['LANG']?>"
                    data-side-modal-class="side-modal-wide side-modal-speaker"
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
                            <?=$item['~PREVIEW_TEXT']?>
                        </div>
                    </div>
                </a>
            </div>
        <? endforeach ?>
    </div>

    <div class="speakers-block-compact">
        <? foreach ($arResult['ITEMS'] as $k => $item): ?>
            <? if ($k > 7) break; ?>
            <a
                href="<?=$item['DETAIL_PAGE_URL']?>"
                class="speakers-block-card"
                data-side-modal
                data-side-modal-url="/api/graduates/element/?id=<?=$item['ID']?>&lang=<?=$arParams['LANG']?>"
                data-side-modal-class="side-modal-wide side-modal-speaker"
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
                        <?=$item['~PREVIEW_TEXT']?>
                    </div>
                </div>
            </a>
        <? endforeach ?>
    </div>
<? endif ?>