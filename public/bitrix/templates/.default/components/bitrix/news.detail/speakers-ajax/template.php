<? 
    use \Bitrix\Main\Localization\Loc;
?>
<div class="side-modal-speaker-card">
    <div class="side-modal-speaker-card-text">
        <div class="side-modal-speaker-name">
            <?=$arResult['NAME']?>
        </div>
        <div class="side-modal-speaker-title">
            <?=$arResult['~PREVIEW_TEXT']?>
        </div>
    </div>
    <div class="side-modal-speaker-card-photo">
        <? if ($arResult['PREVIEW_PICTURE']): ?>
            <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>">
        <? endif ?>
    </div>
</div>

<? if ($arResult['DETAIL_TEXT']): ?>
    <div class="side-modal-speaker-about">
        <div class="side-modal-speaker-about-title">
            <?=Loc::GetMessage('ABOUT_SPEAKER', [], $arParams['LANG'])?>
        </div>

        <?=$arResult['~DETAIL_TEXT']?>
    </div>
<? endif ?>

<? if ($arResult['EVENTS']): ?>
    <div class="side-modal-speaker-events">
        <div class="side-modal-speaker-events-title">
            <?=Loc::GetMessage('EVENTS', [], $arParams['LANG'])?>
        </div>
        <? foreach ($arResult['EVENTS'] as $event): ?>
            <a href="<?=$event['DETAIL_PAGE_URL']?>" class="side-modal-speaker-events-item">
                <div class="side-modal-speaker-events-item-title">
                    <?=$event['NAME']?>
                </div>

                <div class="side-modal-speaker-events-item-meta">
                    <div class="side-modal-speaker-events-item-date">
                        <span class="side-modal-speaker-events-item-date-icon">
                            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-modal-calendar.svg') ?>
                        </span>
                        <?=$event['DATE']?>
                    </div>
                    <? if (isset($event['PROPERTY_AREA_NAME'])): ?>
                        <div class="side-modal-speaker-events-item-place">
                            <span class="side-modal-speaker-events-item-place-icon">
                                <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-modal-marker.svg') ?>
                            </span>
                            <?=$event['PROPERTY_AREA_NAME']?>
                        </div>
                    <? endif ?>
                </div>
            </a>
        <? endforeach ?>
    </div>
<? endif ?>