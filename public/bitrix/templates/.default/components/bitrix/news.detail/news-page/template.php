<div class="wrapper">
    <div class="news-item-wrapper">
        <div class="news-item m-t-xl m-b-xl">
            <div class="news-item-content">
                <h1 class="news-item-title">
                    <?=$arResult['NAME']?>
                </h1>
                <?=$arResult['~DETAIL_TEXT']?>
            </div>
            <aside class="news-item-sidebar">
                <div class="news-item-meta">
                    <div class="news-item-meta-date">
                        <span class="news-item-meta-date-day"><?=$arResult['DAY']?></span> <?=$arResult['DATE']?>
                    </div>
                </div>

                <div class="news-item-share">
                    <div class="news-item-share-title">
                        Поделиться
                    </div>
                    <div class="share-block">
                        <a href="#" target="_blank" class="share-block-item">
                            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-vk.svg'); ?>
                        </a>
                        <a href="#" target="_blank" class="share-block-item">
                            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-facebook.svg'); ?>
                        </a>
                        <a href="#" target="_blank" class="share-block-item">
                            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-twitter.svg'); ?>
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>