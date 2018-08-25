<?
    use \Bitrix\Main\Localization\Loc;
?>
<? if ($arResult['ITEMS']): ?>
    <section class="partners-block partners-block-downarrow">
        <div class="wrapper">
            <div class="partners-block-header">
                <div class="partners-block-header-left">
                    <h3 class="partners-block-title">
                        <?=$arParams['TITLE']?>
                    </h3>
                    <div class="partners-block-subtitle">
                        <?=$arParams['SUBTITLE']?>
                    </div>
                </div>
                <div class="partners-block-header-right">
                    <a href="<?=$arResult['INDEX_PAGE_URL']?>" class="no-wrap">
                        <?=Loc::GetMessage('ALL_PARTNERS', [], $arParams['LANG'])?>
                    </a>
                    <div class="partners-block-header-arrows"></div>
                </div>
            </div>

            <div class="media-block-slider js-partners-slider">
                <? foreach ($arResult['ITEMS'] as $item): ?>
                    <div class="partners-block-slide">
                        <? if ($item['PROPERTIES']['LINK']['VALUE']): ?>
                            <a target="_blank" href="<?=$item['PROPERTIES']['LINK']['VALUE']?>" class="partners-block-card">
                                <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
                            </a>
                        <? else: ?>
                            <a class="partners-block-card">
                                <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
                            </a>
                        <? endif ?>
                    </div>
                <? endforeach ?>
            </div>
            <a
            	href="#"
            	data-side-modal
            	data-side-modal-url="/include/partners/partners-modal-registration.php"
            	data-side-modal-class="registration-modal contestform-modal"
            	data-side-modal-prevent-overlay-close
            	data-side-modal-prevent-esc-close
            	class="button button-red partners-button"
            >
            	Стать партнером
            </a>
        </div>
    </section>
<? endif ?>
