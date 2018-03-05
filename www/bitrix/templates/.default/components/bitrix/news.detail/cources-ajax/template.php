<? 
    use \Bitrix\Main\Localization\Loc;
?>
<? if ($arResult['PREVIEW_PICTURE']): ?>
    <div class="side-modal-news-image">
        <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>">
    </div>
<? endif ?>

<div class="side-modal-news-title">
    <?=$arResult['NAME']?>
</div>
<div class="side-modal-news-description">
    <?=$arResult['~DETAIL_TEXT']?>
</div>

<? if ($arResult['SPEAKERS']): ?>
    <h4 class="tt-uppercase">
        <?=Loc::GetMessage('SPEAKERS', [], $arParams['LANG'])?>
    </h4>

    <div class="m-t-md m-b-md">
        <ul class="speakers-list">
            <? foreach($arResult['SPEAKERS'] as $speaker): ?>
                <li class="speakers-list-item">
                    <a href="<?=$speaker['DETAIL_PAGE_URL']?>" class="speakers-list-item-link">
                        <? if ($speaker['PREVIEW_PICTURE']): ?>
                            <div class="speakers-list-item-photo">
                                <? $img = CFile::ResizeImageGet($speaker['PREVIEW_PICTURE'], ['width' => 80*2, 'height' => 80*2], BX_RESIZE_IMAGE_EXACT); ?>
                                <img src="<?=$img['src']?>" alt="<?=$speaker['NAME']?>">
                            </div>
                        <? else: ?>
                            <div class="speakers-list-item-avatar <?=$speaker['COLOR']?>-theme">
                                <div class="speakers-list-item-avatar-circle">
                                    <?=$speaker['LETTERS']?>
                                </div>
                            </div>
                        <? endif ?>
                        <div class="speakers-list-item-text">
                            <div class="speakers-list-item-title">
                                <?=$speaker['NAME']?>
                            </div>
                            <div class="speakers-list-item-subtitle">
                                <?=$speaker['PREVIEW_TEXT']?>
                            </div>
                        </div>
                    </a>
                </li>
            <? endforeach ?>
        </ul>
    </div>
<? endif ?>

<div class="side-modal-news-buttons">
	<a 
		href="#" 
		data-side-modal 
		data-side-modal-url="<?=$arResult['REGISTRATION_URL']?>" 
		data-side-modal-class="registration-modal"
		data-side-modal-prevent-overlay-close 
		data-side-modal-prevent-esc-close
		class="button button-old-gold"
	>
        <span class="c-text">
            <?=Loc::GetMessage('REGISTRATION', [], $arParams['LANG'])?>
        </span>
    </a>
</div>