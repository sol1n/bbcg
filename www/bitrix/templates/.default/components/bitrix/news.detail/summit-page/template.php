<?
    use \Bitrix\Main\Localization\Loc;
?>
<div class="main-heading main-heading-<?=$arResult['COLOR']?> program-table-main-heading">
    <div class="wrapper">
        <h1 class="main-heading-title">О саммите</h1>
    </div>
</div>
<?
function getRealIP() {
  $ip = false;
  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
     $ips = explode (', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
     for ($i = 0; $i < count($ips); $i++) {
        if (!preg_match("/^(10|172\\.16|192\\.168)\\./", $ips[$i])) {
           $ip = $ips[$i];
           break;
        }
     }
  }
  return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

$user_ip = getRealIP();
print_r('IP '.$user_ip);
$cacheTime = 3600;
$cacheId = 'History_page_' . $arResult['PAGE_ID'] . '_' . $user_ip;
$cachePath = '/';
$obCache = new CPHPCache();

if ($obCache->InitCache($cacheTime, $cacheId, $cachePath)) {
    $cache_result = $obCache->GetVars();
    $cache_try = $cache_result['TRY'];
    $cache_access = $cache_result['ACCESS'];
}

print_r($cache_result);
print_r($cache_access);

//$obCache->Clean($cacheId, $cachePath);
//unset($_SESSION['history-page']);
print_r($_SESSION['history-page']);
?>
<div class="wrapper">
    <div class="news-item-wrapper">
        <div class="news-item m-t-xl m-b-xl">
            <? if (empty($arResult['ACCESS_CODE']) || ($_SESSION['history-page'][$arResult['PAGE_ID']]['access'] == 'Y') || ($cache_access == 'Y')): ?>
                <div class="news-item-content">
                    <h2 class="news-item-title">
                        <?=$arResult['NAME']?>
                    </h2>
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
                        <div class="form-messages animated flash js-form-messages">Authorization error(</div>
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
