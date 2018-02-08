<? if ($arResult['PREVIEW_PICTURE']): ?>
    <div class="side-modal-news-image">
        <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>">
    </div>
<? endif ?>

<div class="side-modal-news-title">
    <?=$arResult['NAME']?>
</div>
<div class="side-modal-news-description">
    <?=$arResult['~DETAIL_TEXT']?>
</div>