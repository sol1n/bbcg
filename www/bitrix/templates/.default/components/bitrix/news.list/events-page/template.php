<?
    use \Bitrix\Main\Localization\Loc;

function cmp($a, $b){
    return strcasecmp($a["PROPERTY_LASTNAME_VALUE"], $b["PROPERTY_LASTNAME_VALUE"]);
}
?>


<div class="program-table-wrapper js-program-table-scroll">
    <? if (! $arResult['ITEMS']): ?>
        <div class="text-center" style="margin: 140px 0">
            <?=Loc::GetMessage('NOT_FOUND', [], $arParams['LANG'])?>
        </div>
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
                                    <div class="program-table-timeline-hour-title"><?=$hour['steps'][0]?></div>
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
                                                    <?
                                                    $intermediate_background = "";
                                                    $intermediate_class = "-main";
                                                    if($event['intermediate'] == "Y"){
                                                        $intermediate_class = "-intermediate";
                                                        $event['duration'] = "30";
                                                        $intermediate_background = "intermediate-background";
                                                    }
                                                    ?>
                                                    <a
                                                        <? if ($event['open']): ?>
                                                            id="program-table-event-<?=$event['id']?>"
                                                            href="<?=$event['href']?>"
                                                            data-side-modal-class="side-modal-wide side-modal-event"
                                                            data-side-modal
                                                            data-side-modal-url="/api/events/element/?id=<?=$event['id']?>&lang=<?=$arParams['LANG']?>"
                                                        <? endif ?>
                                                        data-side-modal-prevent-mobile
                                                        class="
                                                            program-table-event
                                                            program-table-event-global
                                                            program-table-event-offset-<?=$event['offset']?>
                                                            program-table-event-height-<?=$event['duration']?>
                                                            <? if ($event['width']): ?>
                                                                program-table-event-width-<?=$event['width']?>
                                                            <? endif ?>
                                                            <? if ($event['color']): ?>
                                                                program-table-event-<?=$event['color']?>
                                                            <? endif ?>
                                                            program-table-event-<?=$intermediate_background?>
                                                        "
                                                    >
                                                        <div class="program-table-event-meta">
                                                            <span class="program-table-event-meta-date">
                                                                <?=$event['begin']?> — <?=$event['end']?>
                                                            </span>
                                                            <? if(!empty($event['hall'])): ?>
                                                                <span class="c-text m-l-sm"><?=$event['hall']?></span>
                                                            <? endif ?>
                                                        </div>

                                                        <div class="program-table-event-subtitle<?=$intermediate_class?>">
                                                            <?=$event['name']?>
                                                        </div>
                                                        <div class="program-table-event-description">
                                                            <?=$event['detail']?>
                                                        </div>
                                                        <? if ($event['speakers']): ?>
                                                            <? if ($event['column-view'] == true): ?>
                                                                <div class="program-table-event-speakers">
                                                                    <? foreach ($event['speakers'] as $speaker): ?>
                                                                        <p>
                                                                            <b><?=$speaker['NAME']?></b>, <?=$speaker['PREVIEW_TEXT']?>
                                                                            <? if ($speaker['theme']): ?>
                                                                                <br/><i><?=$speaker['theme']?></i>
                                                                            <? endif ?>
                                                                        </p>
                                                                    <? endforeach ?>
                                                                </div>
                                                            <? else: ?>
                                                                <div class="row">
                                                                    <? foreach($event['speakers'] as $row): ?>
                                                                        <div class="col-xs-12 col-sm-4">
                                                                            <div class="program-table-event-speakers">
                                                                                <? foreach ($row as $speaker): ?>
                                                                                <p>
                                                                                    <b><?=$speaker['NAME']?></b>, <?=$speaker['PREVIEW_TEXT']?>
                                                                                    <? if ($speaker['theme']): ?>
                                                                                        <br/><i><?=$speaker['theme']?></i>
                                                                                    <? endif ?>
                                                                                </p>
                                                                                <? endforeach ?>
                                                                            </div>
                                                                        </div>
                                                                    <? endforeach ?>
                                                                </div>
                                                            <? endif ?>
                                                        <? endif ?>
                                                    </a>
                                                <? endforeach ?>
                                            <? endif ?>

                                            <? foreach ($cell[$k] as $event): ?>
                                                <?
                                                $intermediate_background = "";
                                                $intermediate_class = "-main";
                                                if($event['intermediate'] == "Y"){
                                                    $intermediate_class = "-intermediate";
                                                    $event['duration'] = "30";
                                                    $intermediate_background = "intermediate-background";
                                                }
                                                ?>
                                                <a
                                                    <? if ($event['open']): ?>
                                                        id="program-table-event-<?=$event['id']?>"
                                                        href="<?=$event['href']?>"
                                                        data-side-modal-class="side-modal-wide side-modal-event"
                                                        data-side-modal
                                                        data-side-modal-url="/api/events/element/?id=<?=$event['id']?>&lang=<?=$arParams['LANG']?>"
                                                    <? endif ?>
                                                    data-side-modal-prevent-mobile
                                                    class="
                                                        program-table-event
                                                        program-table-event-offset-<?=$event['offset']?>
                                                        program-table-event-height-<?=$event['duration']?>
                                                        <? if ($event['width']): ?>
                                                            program-table-event-width-<?=$event['width']?>
                                                        <? endif ?>
                                                        <? if ($event['color']): ?>
                                                            program-table-event-<?=$event['color']?>
                                                        <? endif ?>
                                                        program-table-event-<?=$intermediate_background?>
                                                    "
                                                >
                                                    <div class="program-table-event-meta">
                                                        <span class="program-table-event-meta-date">
                                                            <?=$event['begin']?> — <?=$event['end']?>
                                                        </span>
                                                        <? if(!empty($event['hall'])): ?>
                                                            <span class="c-text m-l-sm"><?=$event['hall']?></span>
                                                        <? endif ?>
                                                    </div>
                                                    <div class="program-table-event-subtitle<?=$intermediate_class?>">
                                                        <?=$event['name']?>
                                                    </div>
                                                    <div class="program-table-event-description">
                                                        <?=$event['detail']?>
                                                    </div>
                                                    <? if ($event['speakers']): ?>
                                                        <div class="program-table-event-speakers">
                                                            <?usort($event['speakers'], "cmp"); //сортировка спикеров в алфавитном порядке?>
                                                            <? foreach ($event['speakers'] as $speaker): ?>
                                                                <p>
                                                                    <b><?=$speaker['NAME']?></b>, <?=$speaker['PREVIEW_TEXT']?>
                                                                    <? if ($speaker['theme']): ?>
                                                                        <br/><i><?=$speaker['theme']?></i>
                                                                    <? endif ?>
                                                                </p>
                                                            <? endforeach ?>
                                                        </div>
                                                    <? endif ?>
                                                </a>
                                            <? endforeach ?>
                                        </div>
                                    <? endforeach ?>
                                </div>
                            <? endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <? endif ?>
</div>

<div class="program-table-mobile">
    <div class="program-table-mobile-date">
        <?=$arResult['DAY']?> <?=$arResult['MONTH']?>
    </div>

    <? foreach ($arResult['MOBILE_ITEMS'] as $event): ?>
        <div class="
            program-table-mobile-event
            <? if ($event['color']): ?>
                program-table-mobile-event-<?=$event['color']?>
            <? endif ?>
            "
        >
            <a href="<?=$event['href']?>" class="program-table-mobile-event-content">
                <div class="program-table-mobile-event-name">
                    <?=$event['NAME']?>
                </div>
                <div class="program-table-mobile-event-meta">
                    <span class="program-table-mobile-event-date">
                        <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-news-item-clock.svg');  ?>
                        <?=$event['begin']?> — <?=$event['end']?>
                    </span>
                    <? if ($event['area']): ?>
                        <span class="program-table-mobile-event-location">
                            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-map-mark.svg');  ?>
                            <?=$event['area']?>
                        </span>
                    <? endif ?>
                </div>
            </a>
        </div>
    <? endforeach ?>
</div>
