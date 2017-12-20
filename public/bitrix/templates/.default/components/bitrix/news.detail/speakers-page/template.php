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

            <div class="speaker-block-events">
                <div class="speaker-block-events-title">
                    Выступления
                </div>
                <a href="#" class="speaker-block-events-item">
                    <div class="speaker-block-events-item-title">
                        «Система образования как инструмент консолидации городского сообщества»
                    </div>

                    <div class="speaker-block-events-item-meta">
                        <div class="speaker-block-events-item-date">
                                <span class="speaker-block-events-item-date-icon">
                                    <?php include "images/icons/icon-modal-calendar.svg"; ?>
                                </span>
                            7 сентября, 14:00
                        </div>
                        <div class="speaker-block-events-item-place">
                                <span class="speaker-block-events-item-place-icon">
                                    <?php include "images/icons/icon-modal-marker.svg"; ?>
                                </span>
                            Основной зал 1
                        </div>
                    </div>
                </a>

                <a href="#" class="speaker-block-events-item">
                    <div class="speaker-block-events-item-title">
                        Съезд учителей города Москвы
                    </div>

                    <div class="speaker-block-events-item-meta">
                        <div class="speaker-block-events-item-date">
                                <span class="speaker-block-events-item-date-icon">
                                    <?php include "images/icons/icon-modal-calendar.svg"; ?>
                                </span>
                            7 сентября, 14:00
                        </div>
                        <div class="speaker-block-events-item-place">
                                <span class="speaker-block-events-item-place-icon">
                                    <?php include "images/icons/icon-modal-marker.svg"; ?>
                                </span>
                            Основной зал 2
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>