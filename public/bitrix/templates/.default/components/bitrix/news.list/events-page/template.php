<div class="program-table-wrapper js-program-table-scroll">
    <? if (! $arResult['ITEMS']): ?>
        <center style="margin: 140px 0">
            Мероприятия не найдены
        </center>
    <? else: ?>
        <div class="b-smoke-white"> 
            <div class="wrapper"> 
                <div class="program-table" data-program-table-cell-width="<?=$arParams['CELL_WIDTH']?>">
                    <div class="program-table-scrollable js-program-table-scrollable">
                        <div class="program-table-timeline">
                            <div class="program-table-timeline-date">
                                <div class="program-table-timeline-date-title"><?=$arResult['DAY']?></div>
                                <?=$arResult['MONTH']?>
                            </div>
                            <? foreach ($arResult['HOURS'] as $hour): ?>
                                <div class="program-table-timeline-hour">
                                    <? foreach ($hour['steps'] as $k => $step): ?>
                                        <? if ($k): ?>
                                            <div class="program-table-timeline-hour-sixth"><?=$step?></div>
                                        <? else: ?>
                                            <div class="program-table-timeline-hour-title"><?=$step?></div>
                                        <? endif ?>
                                    <? endforeach ?>
                                </div>
                            <? endforeach ?>
                        </div>
                        <div class="program-table-heading">
                            <? foreach ($arResult['AREAS'] as $area): ?>
                                <div class="program-table-heading-cell">
                                    <div class="program-table-heading-cell-title"><?=$area['NAME']?></div>
                                </div>
                            <? endforeach ?>
                        </div>
                        <div class="program-table-scroll">
                            <div class="program-table-scroll-track js-program-table-scroll-track">
                                <div class="program-table-scroll-left js-program-table-scroll-left"></div>
                                <div class="program-table-scrollbar js-program-table-scrollbar"></div>
                                <div class="program-table-scroll-right js-program-table-scroll-right"></div>
                            </div>
                        </div>
                        <div class="program-table-columns">
                            <? foreach ($arResult['AREAS'] as $k => $area): ?>
                                <div class="program-table-column">
                                    <? foreach ($arResult['TIMELINE'] as $cell): ?>
                                        <div class="program-table-column-hour">
                                            <? if ($area['FIRST']): ?>
                                                <? foreach ($cell['GLOBALS'] as $event): ?>
                                                    <a 
                                                        href="program-event.php" 
                                                        data-side-modal-class="side-modal-wide side-modal-event" 
                                                        data-side-modal 
                                                        data-side-modal-url="blocks/event-modal.php" 
                                                        data-side-modal-prevent-mobile 
                                                        class="
                                                            program-table-event
                                                            program-table-event-global
                                                            program-table-event-offset-<?=$event['offset']?>
                                                            program-table-event-height-<?=$event['duration']?>
                                                            <? if ($event['width']): ?>
                                                                program-table-event-width-<?=$event['width']?>
                                                            <? endif ?>
                                                        "
                                                    >
                                                        <div class="program-table-event-meta">
                                                            <span class="program-table-event-meta-date">
                                                                <?=$event['begin']?> — <?=$event['end']?>
                                                            </span>
                                                        </div>

                                                        <div class="program-table-event-title">
                                                            <?=$event['name']?>
                                                        </div>
                                                    </a>
                                                <? endforeach ?>
                                            <? endif ?>

                                            <? foreach ($cell[$k] as $event): ?>
                                                <a 
                                                    href="program-event.php" 
                                                    data-side-modal-class="side-modal-wide side-modal-event" 
                                                    data-side-modal 
                                                    data-side-modal-url="blocks/event-modal.php" 
                                                    data-side-modal-prevent-mobile 
                                                    class="
                                                        program-table-event
                                                        program-table-event-offset-<?=$event['offset']?>
                                                        program-table-event-height-<?=$event['duration']?>
                                                        <? if ($event['width']): ?>
                                                            program-table-event-width-<?=$event['width']?>
                                                        <? endif ?>
                                                    "
                                                >
                                                    <div class="program-table-event-meta">
                                                        <span class="program-table-event-meta-date">
                                                            <?=$event['begin']?> — <?=$event['end']?>
                                                        </span>
                                                    </div>

                                                    <div class="program-table-event-title">
                                                        <?=$event['name']?>
                                                    </div>
                                                </a>
                                            <? endforeach ?>
                                        </div>
                                    <? endforeach ?>
                                    <div class="program-table-column-hour program-table-column-hour-large">

                                    </div>
                                </div>
                            <? endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <? endif ?>
</div>