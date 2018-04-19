<?
    use \Bitrix\Main\Localization\Loc;
?>
<div class="main-heading main-heading-<?=$arResult['COLOR']?> program-table-main-heading">
    <div class="wrapper">
        <h1 class="main-heading-title"><?=$arResult['NAME']?></h1>
    </div>
</div>

<div class="wrapper">
    <div class="news-item-wrapper">
        <div class="news-item m-t-xl m-b-xl">

            <? if (empty($arResult['ACCESS_CODE']) || ($arResult['SESSION_ACCESS'] == 'Y')): ?>
                <div class="news-item-content">
                    <?=$arResult['~DETAIL_TEXT']?>
                </div>
                <aside class="news-item-sidebar">
                    <div class="news-item-meta">
                        <div class="news-item-meta-date">
                            <span class="news-item-meta-date-day"><?=$arResult['DAYS']?></span> <?=$arResult['MONTH']?>
                        </div>
                    </div>
                    <div class="news-item-share">
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
                </aside>
            <? else: ?>
                <form action="/api/summit/page-access/" method="POST" class="summit-registration-block-form p-none" data-validate data-form-ajax>
                    <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>
                    <input name="page" value="<?=$arResult['PAGE_ID']?>" type="hidden">
                    <div class="summit-registration-block-form-title">
                        <?=Loc::GetMessage('ACCESS_CODE_FORM', [], $arParams['LANG'])?>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div class="m-b">
                                <label class="form-label">
                                    <?=Loc::GetMessage('ACCESS_CODE_LABEL', [], $arParams['LANG'])?>
                                </label>
                                <input type="text" name="code" class="form-input" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-messages animated flash js-form-messages"></div>
                    </div>
                    <div class="submit-registration-block-form-footer">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <button type="submit" class="button button-<?=$arResult['PROPERTIES']['COLOR']['VALUE']?>">
                                    <?=Loc::GetMessage('ACCESS_CODE_SUBMIT', [], $arParams['LANG'])?>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            <? endif ?>
        </div>
    </div>
</div>
