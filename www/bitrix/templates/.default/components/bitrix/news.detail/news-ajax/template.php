<?
    use \Bitrix\Main\Localization\Loc;
?>
<? if ($arResult['PREVIEW_PICTURE']): ?>
    <div class="side-modal-news-image">
        <img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['NAME']?>">
    </div>
<? endif ?>

<div class="side-modal-news-date">
    <?=$arResult['DATE']?>
</div>
<div class="side-modal-news-title">
    <?=$arResult['NAME']?>
</div>
<div class="side-modal-news-hidden">
    <?=$arResult['~PREVIEW_TEXT']?>
</div>
<div class="side-modal-news-description">
    <?=$arResult['~DETAIL_TEXT']?>
</div>

<div class="news-item-share m-t-lg" data-url="<?=$arResult["DETAIL_PAGE_URL"];?>">
	<div class="news-item-share-title">
		<?=Loc::GetMessage('SHARE', [], $arParams['LANG'])?>
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
