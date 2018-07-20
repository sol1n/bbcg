<?
    use \Bitrix\Main\Localization\Loc;
?>

<? $user = $arParams['USER']; ?>

<div class="registration-modal-logo">
    <img src="/assets/images/summits-logo/fashion-retail-business-label.svg" alt="FASHION RETAIL RUSSIA">
</div>

<div class="registration-modal-title ">
    <?=$arParams['TITLE']?>
</div>

<form action="<?=$arResult['REGISTRATION_URL']?>" method="POST" class="summit-registration-block-form" data-validate data-form-ajax>
    <input type="hidden" name="from" value="miss-retail">
    <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        <?=Loc::GetMessage('FULLNAME', [], $arParams['LANG'])?>
                    </label>
                    <? if (isset($arParams['USER']['LAST_NAME'])||isset($arParams['USER']['NAME'])): ?>
                        <input type="text" name="fullname" class="form-input" value="<?=$arParams['USER']['LAST_NAME']. ' ' .$arParams['USER']['NAME']?>" required>
                    <? else: ?>
                        <input type="text" name="fullname" class="form-input" required>
                    <? endif ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        <?=Loc::GetMessage('BIRTHDATE', [], $arParams['LANG'])?>
                    </label>
                    <? if (isset($arParams['USER']['PERSONAL_BIRTHDAY'])): ?>
                        <?
                            $bdate = $arParams['USER']['PERSONAL_BIRTHDAY'];
                            $bdate=@date('Y-m-d', strtotime($bdate));
                        ?>
                        <input type="date" name="birthdate" class="form-input missretail-datepicker" value="<?=$bdate?>" required>
                    <? else: ?>
                        <input type="date" name="birthdate" class="form-input missretail-datepicker" required>
                    <? endif ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
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
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        <?=Loc::GetMessage('EDUCATION', [], $arParams['LANG'])?>
                    </label>
                    <input type="text" name="education" class="form-input" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
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
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        <?=Loc::GetMessage('WORK_EXPERIENCE', [], $arParams['LANG'])?>
                    </label>
                    <input type="text" name="work_experience" class="form-input" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        <?=Loc::GetMessage('PROFESSION_CHOICE', [], $arParams['LANG'])?>
                    </label>
                    <textarea name="profession_choice" class="form-input" required></textarea>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        <?=Loc::GetMessage('DREAMS', [], $arParams['LANG'])?>
                    </label>
                    <textarea name="dreams" class="form-input" required></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        <?=Loc::GetMessage('WORK_FOR_YOU', [], $arParams['LANG'])?>
                    </label>
                    <textarea name="work_for_you" class="form-input" required></textarea>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        <?=Loc::GetMessage('HOBBY', [], $arParams['LANG'])?>
                    </label>
                    <textarea name="hobby" class="form-input" required></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label"><?=Loc::GetMessage('PHOTO', [], $arParams['LANG'])?></label>
                    <input type="file" name="file" id="file" class="missretail-inputfile" />
                    <label for="file"><?=Loc::GetMessage('CHOOSE_FILE', [], $arParams['LANG'])?></label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <p class="m-t-md">
                        Вы можете загрузить файл размером до 5 Mb и расширением .jpg .png .bmp
                    </p>
                </div>
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
