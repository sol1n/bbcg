<?
    use \Bitrix\Main\Localization\Loc;
?>

<? $user = $arParams['USER']; ?>

<div class="registration-modal-logo">
    <img src="/assets/images/retail-academy-horizontal.svg" alt="Академия Ритейла — BBCG">
</div>

<div class="registration-modal-title">
    <?=$arParams['TITLE']?>
</div>

<form action="<?=$arResult['REGISTRATION_URL']?>" method="POST" class="academy-form-modal summit-registration-block-form" data-validate data-form-ajax data-crm-token="academy-form-modal">
    <input type="hidden" name="from" value="retail-academy">
    <input type="text" name="full_name" class="form-input hidden">
    <input type="text" name="event" class="form-input hidden" value="Академия ритейла">
    <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="m-b">
                <label class="form-label">
                    <?=Loc::GetMessage('SURNAME', [], $arParams['LANG'])?>
                </label>
                <? if (isset($arParams['USER']['LAST_NAME'])): ?>
                    <input type="text" name="surname" class="form-input" value="<?=$arParams['USER']['LAST_NAME']?>" required>
                <? else: ?>
                    <input type="text" name="surname" class="form-input" required>
                <? endif ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="m-b">
                <label class="form-label">
                    <?=Loc::GetMessage('NAME', [], $arParams['LANG'])?>
                </label>
                <? if (isset($arParams['USER']['NAME'])): ?>
                    <input type="text" name="name" class="form-input" value="<?=$arParams['USER']['NAME']?>" required>
                <? else: ?>
                    <input type="text" name="name" class="form-input" required>
                <? endif ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="m-b">
                <label class="form-label">
                    <?=Loc::GetMessage('PHONE', [], $arParams['LANG'])?>
                </label>
                <? if (isset($arParams['USER']['PERSONAL_PHONE'])): ?>
                    <input type="text" name="phone" class="form-input" placeholder="+7 (999) 999-99-99" data-masked-input="+7 (000) 000-00-00" data-masked-input-placeholder="+7 (___) ___-__-__" data-masked-input-clearifnotmatch value="<?=$arParams['USER']['PERSONAL_PHONE']?>" required>
                <? else: ?>
                    <input type="text" name="phone" class="form-input" placeholder="+7 (999) 999-99-99" data-masked-input="+7 (000) 000-00-00" data-masked-input-placeholder="+7 (___) ___-__-__" data-masked-input-clearifnotmatch required>
                <? endif ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="m-b">
                <label class="form-label">
                    <?=Loc::GetMessage('EMAIL', [], $arParams['LANG'])?>
                </label>
                <? if (isset($arParams['USER']['EMAIL'])): ?>
                    <input type="email" name="email" class="form-input" value="<?=$arParams['USER']['EMAIL']?>" required>
                <? else: ?>
                    <input type="email" name="email" class="form-input" required>
                <? endif ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="m-b">
                <label class="form-label">
                    <?=Loc::GetMessage('COMPANY', [], $arParams['LANG'])?>
                </label>
                <? if (isset($arParams['USER']['WORK_COMPANY'])): ?>
                    <input type="text" name="company" class="form-input" value="<?=$arParams['USER']['WORK_COMPANY']?>" required>
                <? else: ?>
                    <input type="text" name="company" class="form-input" required>
                <? endif ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="m-b">
                <label class="form-label">
                    <?=Loc::GetMessage('POSITION', [], $arParams['LANG'])?>
                </label>
                <? if (isset($arParams['USER']['WORK_POSITION'])): ?>
                    <input type="text" name="title" class="form-input" value="<?=$arParams['USER']['WORK_POSITION']?>" required>
                <? else: ?>
                    <input type="text" name="title" class="form-input" required>
                <? endif ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="m-b">
                <label class="form-label">
                    <?=Loc::GetMessage('CHOOSE_PROGRAM', [], $arParams['LANG'])?>
                </label>
                <div class="form-select">
                    <select name="program">
                        <? foreach ($arResult['ITEMS'] as $item): ?>
                            <? if ($item['ID'] == $arParams['SELECTED']): ?>
                                <option selected value="<?=$item['ID']?>"><?=$item['NAME']?></option>
                            <? else: ?>
                                <option value="<?=$item['ID']?>"><?=$item['NAME']?></option>
                            <? endif ?>
                        <? endforeach ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="submit-registration-block-form-hint">
                <?=Loc::GetMessage('WE_WILL_CONTACT_YOU', [], $arParams['LANG'])?>
            </div>
        </div>
    </div>
    <div class="registration-form-submit">
        <button type="submit" class="button button-old-gold">
            <span class="c-text"><?=Loc::GetMessage('DO_REGISTER', [], $arParams['LANG'])?></span>
        </button>
    </div>
</form>
