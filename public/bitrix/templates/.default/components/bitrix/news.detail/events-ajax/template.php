<div class="side-modal-event-title">
    <?=$arResult['NAME']?>
</div>

<div class="news-item-meta-2 m-b-lg">
    <span class="news-item-meta-2-date">
        <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-news-item-clock.svg'); ?>
        <?=$arResult['DATE']?>
    </span>
    <? if ($arResult['AREA']): ?>
        <span class="news-item-meta-2-place">
            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-map-mark.svg'); ?>
            <?=$arResult['AREA']?>
        </span>
    <? endif ?>
</div>

<div class="side-modal-event-description">
    <?=$arResult['~DETAIL_TEXT']?>
</div>

<? if ($arResult['SPEAKERS']): ?>
    <h4 class="tt-uppercase">Спикеры</h4>

    <div class="m-t-md m-b-md">
        <ul class="speakers-list">
            <? foreach($arResult['SPEAKERS'] as $speaker): ?>
                <li class="speakers-list-item">
                    <a href="<?=$speaker['DETAIL_PAGE_URL']?>" class="speakers-list-item-link">
                        <div class="speakers-list-item-photo">
                            <? $img = CFile::ResizeImageGet($speaker['PREVIEW_PICTURE'], ['width' => 80*2, 'height' => 80*2], BX_RESIZE_IMAGE_EXACT); ?>
                            <img src="<?=$img['src']?>" alt="<?=$speaker['NAME']?>">
                        </div>
                        <div class="speakers-list-item-text">
                            <div class="speakers-list-item-title">
                                <?=$speaker['NAME']?>
                            </div>
                            <?=$speaker['PREVIEW_TEXT']?>
                        </div>
                    </a>
                </li>
            <? endforeach ?>
        </ul>
    </div>
<? endif ?>