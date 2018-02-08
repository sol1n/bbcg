<? 
    use \Bitrix\Main\Localization\Loc;
?>
<? if ($arResult['ITEMS']): ?>
    <section class="sessions-block">
        <div class="wrapper">
            <div class="sessions-block-header">
                <div class="sessions-block-header-left">
                    <div class="sessions-block-title">
                        <?=$arParams['TITLE']?>
                    </div>
                    <div class="sessions-block-subtitle">
                        <?=$arParams['SUBTITLE']?>
                    </div>
                </div>
                <div class="sessions-block-header-right">
                    <a href="events/" class="no-wrap">
                        <?=Loc::GetMessage('ALL_EVENTS', [], $arParams['LANG'])?>
                    </a>
                    <div class="sessions-block-header-arrows"></div>
                </div>
            </div>

            <div class="sessions-block-slider js-sessions-slider">
                <? foreach ($arResult['ITEMS'] as $item): ?>
                        <div class="sessions-block-slider-item">
                            <a 
                                href="events/<?=$item['ID']?>/"
                                data-side-modal-class="side-modal-wide side-modal-event" 
                                data-side-modal 
                                data-side-modal-url="/api/events/element/?id=<?=$item['ID']?>"
                                data-side-modal-prevent-mobile 
                                class="sessions-block-item"
                            >
                                <? if ($item['TAG']): ?>
                                    <div class="sessions-block-item-tag">
                                        <?=$item['TAG']?>
                                    </div>
                                <? endif ?>
                                <div class="sessions-block-item-photo">
                                    <? $img = CFile::ResizeImageGet($item['PREVIEW_PICTURE']['ID'], ['width' => 356*2, 'height' => 230*2], BX_RESIZE_IMAGE_EXACT); ?>
                                    <img src="<?=$img['src']?>" alt="<?=$item['NAME']?>">
                                    <? if ($item['SPEAKER']): ?>
                                        <div class="sessions-block-item-photo-info">
                                            <div class="sessions-block-item-photo-info-title">
                                                <?=$item['SPEAKER']['NAME']?>
                                            </div>
                                            <div class="sessions-block-item-photo-info-subtitle">
                                                <?=$item['SPEAKER']['PREVIEW_TEXT']?>
                                            </div>
                                        </div>
                                    <? endif ?>
                                </div>
                                <div class="sessions-block-item-content">
                                    <div class="sessions-block-item-title">
                                        <?=$item['NAME']?>
                                    </div>
                                    <div class="sessions-block-item-desc">
                                        <?=$item['PREVIEW_TEXT']?>
                                    </div>

                                    <div class="sessions-block-item-meta">
                                        <div class="sessions-block-item-date">
                                            <?=$item['DATE']?>
                                        </div>
                                        <div class="sessions-block-item-readmore">
                                            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-news-readmore.svg') ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                <? endforeach ?>
            </div>
        </div>
    </section>
<? endif ?>