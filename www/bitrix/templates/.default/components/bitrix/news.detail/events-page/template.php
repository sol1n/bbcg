<div class="wrapper">
    <div class="news-item-wrapper">
        <div class="news-item m-t-xl m-b-xl">
            <div class="news-item-content">
                <h1 class="news-item-title"><?=$arResult['NAME']?></h1>
                <?=$arResult['~DETAIL_TEXT']?>

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

                <? if ($arResult['SPEAKERS']): ?>
                    <h4 class="tt-uppercase">Спикеры</h4>

                    <div class="m-t-md m-b-md">
                        <ul class="speakers-list">
                            <? foreach($arResult['SPEAKERS'] as $speaker): ?>
                                <li class="speakers-list-item">
                                    <a href="<?=$speaker['DETAIL_PAGE_URL']?>" class="speakers-list-item-link">
                                        <? if ($speaker['PREVIEW_PICTURE']): ?>
                                            <div class="speakers-list-item-photo">
                                                <? $img = CFile::ResizeImageGet($speaker['PREVIEW_PICTURE'], ['width' => 80*2, 'height' => 80*2], BX_RESIZE_IMAGE_EXACT); ?>
                                                <img src="<?=$img['src']?>" alt="<?=$speaker['NAME']?>">
                                            </div>
                                        <? else: ?>
                                            <div class="speakers-list-item-avatar <?=$speaker['COLOR']?>-theme">
                                                <div class="speakers-list-item-avatar-circle">
                                                    <?=$speaker['LETTERS']?>
                                                </div>
                                            </div>
                                        <? endif ?>
                                        <div class="speakers-list-item-text">
                                            <div class="speakers-list-item-title">
                                                <?=$speaker['NAME']?>
                                            </div>
                                            <div class="speakers-list-item-subtitle">
                                                <?=$speaker['PREVIEW_TEXT']?>
                                            </div>
                                            <? if ($speaker['theme']): ?>
                                                <div class="speakers-list-item-event">
                                                    <?=$speaker['theme']?>
                                                </div>
                                            <? endif ?>
                                        </div>
                                    </a>
                                </li>
                            <? endforeach ?>
                        </ul>
                    </div>
                <? endif ?>

                <div class="news-item-share m-t-lg">
                    <div class="news-item-share-title">
                        Поделиться
                    </div>
                    <div class="share-block">
                        <a href="#" target="_blank" data-share="vk" class="share-block-item">
                            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-vk.svg'); ?>
                        </a>
                        <a href="#" target="_blank" data-share="fb" class="share-block-item">
                            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-facebook.svg'); ?>
                        </a>
                        <a href="#" target="_blank" data-share="tw" class="share-block-item">
                            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-twitter.svg'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
