<div class="wrapper">
    <div class="speaker-block-wrapper">
        <div class="speaker-block p-t-xl p-b-xl">
            <div class="speaker-block-card">
                <div class="speaker-block-card-text">
                    <div class="speaker-block-name">
                        <?=$arResult['NAME']?>
                    </div>

                    <div class="speaker-block-title">
                        <?=$arResult['PREVIEW_TEXT']?>
                    </div>

                    <? if ($arResult['PROPERTIES']['SUBTITLE']['VALUE']): ?>
                        <div class="speaker-block-subtitle">
                            <?=$arResult['PROPERTIES']['SUBTITLE']['VALUE']?>
                        </div>
                    <? endif ?>
                </div>

                <? if ($arResult['PREVIEW_PICTURE']): ?>
                    <div class="speaker-block-card-photo">
                        <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>">
                    </div>
                <? endif ?>
            </div>

            <? if ($arResult['DETAIL_TEXT']): ?>
                <div class="speaker-block-about">
                    <div class="speaker-block-about-title">
                        О спикере
                    </div>

                    <?=$arResult['~DETAIL_TEXT']?>
                </div>
            <? endif ?>

            <? if ($arResult['EVENTS']): ?>
                <div class="speaker-block-events">
                    <div class="speaker-block-events-title">
                        Выступления
                    </div>
                    <? foreach ($arResult['EVENTS'] as $event): ?>
                        <a href="<?=$event['DETAIL_PAGE_URL']?>" class="speaker-block-events-item">
                            <div class="speaker-block-events-item-title">
                                <?=$event['NAME']?>
                            </div>

                            <div class="speaker-block-events-item-meta">
                                <div class="speaker-block-events-item-date">
                                    <span class="speaker-block-events-item-date-icon">
                                        <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-modal-calendar.svg') ?>
                                    </span>
                                    <?=$event['DATE']?>
                                </div>
                                <div class="speaker-block-events-item-place">
                                    <span class="speaker-block-events-item-place-icon">
                                        <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-modal-marker.svg') ?>
                                    </span>
                                    <?=$event['PROPERTY_AREA_NAME']?>
                                </div>
                            </div>
                        </a>
                    <? endforeach ?>
                </div>
            <? endif ?>
        </div>
    </div>
</div>