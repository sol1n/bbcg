<? if ($arResult['ITEMS']): ?>
    <div class="wrapper m-t-md m-b-md">
        <div class="row events-calendar-row">
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <? $color = $item['PROPERTIES']['COLOR']['VALUE']; ?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <a href="<?=$item['DETAIL_PAGE_URL']?>" class="events-calendar-item m-b-md">
                        <div class="events-calendar-item-header">
                            <? if ($item['PREVIEW_PICTURE']): ?>
                                <? $img = CFile::ResizeImageGet($item['PREVIEW_PICTURE']['ID'], ['width' => 360*2, 'height' => 250*2], BX_RESIZE_IMAGE_EXACT); ?>
                                <div class="news-block-item-photo">
                                    <img src="<?=$img['src']?>" alt="<?=$item['NAME']?>">
                                </div>
                            <? elseif ($item['PROPERTIES']['ICON']['VALUE']): ?>
                                <?$icon = CFile::ResizeImageGet($item['PROPERTIES']['ICON']['VALUE'], Array("width" => 116, "height" => 116), BX_RESIZE_IMAGE_EXACT, false); ?>
                                <div class="events-calendar-item-icon">
                                    <img src="<?=$icon['src']?>" alt="<?=$item['NAME']?>">
                                </div>
                            <? endif ?>
                            <div class="events-calendar-item-header-title m-t">
                                <? $summitLogo = CFile::GetPath($item['PROPERTIES']['HEADER_LOGO']['VALUE']); ?>
                                <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . $summitLogo); ?>
                            </div>
                        </div>
                        <div class="events-calendar-item-body">
                            <div class="events-calendar-item-description">
                                <?=$item['PREVIEW_TEXT']?>
                            </div>
                            <div class="events-calendar-item-meta">
                                <div class="events-calendar-item-date">
                                    <?
                                    $short_text_arr = explode(' ', trim($item['PROPERTIES']['SHORT_DESCRIPTION']['VALUE']));
                                    $short_text_first = array_shift($short_text_arr);
                                    $short_text_first = trim($short_text_first, ",");
                                    $short_text = implode(' ', $short_text_arr);
                                    //print_r($short_text1);
                                    //print_r($short_text2);
                                    ?>
                                    <span class="events-calendar-item-small-line c-<?=$item['PROPERTIES']['COLOR']['VALUE']?>"><span class="c-text"><?=$short_text_first;?></span></span>
                                    <?=$short_text;?>
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
