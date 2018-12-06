<?
    use \Bitrix\Main\Localization\Loc;
?>
<? if ($arResult['ITEMS']): ?>
        <div class="speakers-block-header m-t-md">
            <div class="speakers-block-header-left">
                <input required placeholder="Имя Фамилия" calss="speakers-contest-input" type="text" name="speaker" id="speakers-contest-options" value="" list="optionslist">
                <datalist id="optionslist" title="Выберите спикера">
                    <!--[if lte IE 9]><select><![endif]-->
                    <? foreach ($arResult['ITEMS'] as $item): ?>
                        <?/*
                        if(!empty($item['PROPERTIES']['VOTES']['VALUE'])){
                            $votes = $item['PROPERTIES']['VOTES']['VALUE'];
                        } else {
                            $votes = 0;
                        }*/
                        ?>
                        <option value="<?=$item['NAME']?>" data-value="<?=$item['ID']?>"></option>
                    <? endforeach ?>
                    <!--[if lte IE 9]></select><![endif]-->
                </datalist>
            </div>
            <div class="speakers-block-header-right">
                <a href="<?=$arResult['INDEX_PAGE_URL']?>" class="no-wrap" target="_blank">
                    <?=Loc::GetMessage('ALL_SPEAKERS', [], $arParams['LANG'])?>
                </a>
                <div class="speakers-block-header-arrows m-b-xs"></div>
            </div>
        </div>

        <div class="speakers-block-slider js-speakers-slider">
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <div class="speakers-block-slider-item">
                    <a
                        href="<?=$item['DETAIL_PAGE_URL']?>"
                        class="speakers-block-card"
                        data-side-modal
                        data-side-modal-url="/api/speakers/element/?id=<?=$item['ID']?>&lang=<?=$arParams['LANG']?>"
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
                                <?=$item['PREVIEW_TEXT']?>
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
                    data-side-modal-url="/api/speakers/element/?id=<?=$item['ID']?>&lang=<?=$arParams['LANG']?>"
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

        <? if ($arParams['DESCRIPTION']): ?>
            <div class="speakers-block-footer">
                <?=htmlspecialchars_decode($arParams['DESCRIPTION'])?>
            </div>
        <? endif ?>
<? endif ?>
