<section class="news-block news-block-downarrow">
    <div class="wrapper">
        <div class="news-block-header">
            <div class="news-block-header-left">
                <div class="news-block-title">
                    Новости и события ритейла
                </div>
                <div class="news-block-subtitle">
                    Узнайте эксклюзивную информацию о рынке до появления в СМИ
                </div>
            </div>
            <div class="news-block-header-right">
                <a href="/news/" class="no-wrap">
                    Все новости
                </a>
                <div class="news-block-header-arrows"></div>
            </div>
        </div>

        <div class="news-block-slider js-news-slider">
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <? $date = FormatDate('j F', MakeTimeStamp($item['ACTIVE_FROM'], "DD.MM.YYYY HH:MI:SS")); ?>
                <div class="news-block-slider-item">
                    <? if ($item['PREVIEW_PICTURE']): ?>
                        <a 
                            href="<?=$item['DETAIL_PAGE_URL']?>" 
                            class="news-block-item news-block-item-with-photo" 
                            data-side-modal 
                            data-side-modal-url="/api/news/element/?id=<?=$item['ID']?>&lang=ru"
                            data-side-modal-class="side-modal-wide side-modal-news"
                        >
                            <? $img = CFile::ResizeImageGet($item['PREVIEW_PICTURE']['ID'], ['width' => 274*2, 'height' => 238*2], BX_RESIZE_IMAGE_EXACT); ?>
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
                        <div class="news-block-slider-item">
                            <a 
                                href="<?=$item['DETAIL_PAGE_URL']?>" 
                                class="news-block-item news-block-item-blank" 
                                data-side-modal 
                                data-side-modal-url="/api/news/element/?id=<?=$item['ID']?>&lang=ru"
                                data-side-modal-class="side-modal-wide side-modal-news"
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
                        </div>
                    <? endif ?>
                </div>
            <? endforeach ?>
        </div>
    </div>
</section>