<div class="wrapper m-t-md m-b-md">
    <div class="row">
        <? foreach ($arResult['ITEMS'] as $item): ?>
            <? $date = FormatDate('j F', MakeTimeStamp($item['ACTIVE_FROM'], "DD.MM.YYYY HH:MI:SS")); ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <? if ($item['PREVIEW_PICTURE']): ?>
                    <a
                        <? if ($arParams['OPEN_MODAL']): ?>
                            data-side-modal 
                            data-side-modal-url="/api/news/element/?id=<?=$item['ID']?>&lang=ru"
                            data-side-modal-class="side-modal-wide side-modal-news"
                        <? endif ?>
                        href="<?=$item['DETAIL_PAGE_URL']?>" 
                        class="news-block-item news-block-item-with-photo m-b-md"
                    >
                        <? $img = CFile::ResizeImageGet($item['PREVIEW_PICTURE']['ID'], ['width' => 357*2, 'height' => 238*2], BX_RESIZE_IMAGE_EXACT); ?>
                        <div class="news-block-item-photo">
                            <img src="<?=$img['src']?>" alt="<?=$item['NAME']?>">
                        </div>
                        <div class="news-block-item-content">
                            <div class="news-block-item-title">
                                <?=$item['NAME']?>
                            </div>
                            <div class="news-block-item-meta">
                                <div class="news-block-item-date">
                                    <?=$date?>
                                </div>
                                <div class="news-block-item-readmore">
                                    <?=file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-news-readmore.svg')?>
                                </div>
                            </div>
                        </div>
                    </a>
                <? else: ?>
                    <a
                        <? if ($arParams['OPEN_MODAL']): ?>
                            data-side-modal 
                            data-side-modal-url="/api/news/element/?id=<?=$item['ID']?>&lang=ru"
                            data-side-modal-class="side-modal-wide side-modal-news"
                        <? endif ?>
                        href="<?=$item['DETAIL_PAGE_URL']?>" 
                        class="news-block-item news-block-item-blank m-b-md"
                    >
                        <div class="news-block-item-content">
                            <div class="news-block-item-title">
                                <?=$item['NAME']?>
                            </div>
                            <div class="news-block-item-meta">
                                <div class="news-block-item-date">
                                    <?=$date?>
                                </div>
                                <div class="news-block-item-readmore">
                                    <?=file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-news-readmore.svg')?>
                                </div>
                            </div>
                        </div>
                    </a>
                <? endif ?>
            </div>
        <? endforeach ?>
    </div>
    <?=$arResult['NAV_STRING']?>
</div>