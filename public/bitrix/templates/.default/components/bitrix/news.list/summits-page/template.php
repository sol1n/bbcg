<? if ($arResult['ITEMS']): ?>
    <div class="wrapper m-t-md m-b-md">
        <div class="row events-calendar-row">
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <? $color = $item['PROPERTIES']['COLOR']['VALUE']; ?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <a href="<?=$item['DETAIL_PAGE_URL']?>" class="events-calendar-item m-b-md">
                        <div class="events-calendar-item-header">
                            <? if ($item['PROPERTIES']['ICON']['VALUE']): ?>
                                <? $icon = CFile::GetPath($item['PROPERTIES']['ICON']['VALUE']); ?>
                                <div class="events-calendar-item-icon">
                                    <img src="<?=$icon?>" alt="<?=$item['NAME']?>">
                                </div>
                            <? endif ?>
                            <div class="events-calendar-item-header-title">
                                <span class="events-calendar-item-header-title-em b-<?=$color?>"><?=$item['PROPERTIES']['LEFT_PART_NAME']['VALUE']?></span>
                                <?=$item['PROPERTIES']['RIGHT_PART_NAME']['VALUE']?>
                            </div>
                            <div class="events-calendar-item-header-subtitle">
                                <?=$item['PROPERTIES']['SHORT_DESCRIPTION']['VALUE']?>
                            </div>
                        </div>
                        <div class="events-calendar-item-body">
                            <div class="events-calendar-item-body-title">
                                <?=$item['NAME']?>
                            </div>
                            <div class="events-calendar-item-description">
                                <?=$item['PREVIEW_TEXT']?>
                            </div>
                            <div class="events-calendar-item-meta">
                                <div class="events-calendar-item-date">
                                    <?=$item['DURATION']?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <? endforeach ?>
        </div>
    </div>
<? else: ?>
    <center style="margin: 150px 0">По вашему запросу ничего не найдено</center>
<? endif ?>