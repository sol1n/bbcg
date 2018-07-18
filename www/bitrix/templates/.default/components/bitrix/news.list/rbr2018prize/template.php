<?
    use \Bitrix\Main\Localization\Loc;
?>

<? $user = $arParams['USER']; ?>

<div class="registration-modal-logo">
    <img src="/assets/images/summits-logo/retail-business-russia-label.svg" alt="RETAIL BUSINESS RUSSIA">
</div>

<div class="registration-modal-title ">
    <?=$arParams['TITLE']?>
</div>
<div class="registration-modal-subtitle ">
    <?=Loc::GetMessage('REGISTRATION', [], $arParams['LANG'])?>
</div>

<form action="<?=$arResult['REGISTRATION_URL']?>" method="POST" class="summit-registration-block-form" data-validate data-form-ajax>
    <input type="hidden" name="from" value="rbr2018prize">
    <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>

    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="m-b">
                <label class="form-label">
                    <?=Loc::GetMessage('SELECT_NOMINATION', [], $arParams['LANG'])?>
                </label>
                <div class="form-select">
                    <select name="nomination">
                        <option value="team_z">Команда Z</option>
                        <option value="pioneer_of_innovation">Пионер инноваций</option>
                        <option value="open_mind">Открытое сознание</option>
                        <option value="big_heart">Большое сердце</option>
                        <option value="true_omni">&laquo;Тру омни&raquo;</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="m-b">
                <label class="form-label">
                    <?=Loc::GetMessage('COMPANY', [], $arParams['LANG'])?>
                </label>
                <input type="text" name="company" class="form-input" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="m-b">
                <label class="form-label">
                    <?=Loc::GetMessage('CONTACTS', [], $arParams['LANG'])?>
                </label>
                <textarea name="contacts" class="form-input" required></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="m-b">
                <label class="form-label">
                    <?=Loc::GetMessage('WHY_DESERVES', [], $arParams['LANG'])?>
                </label>
                <textarea name="why_deserves" class="form-input" required></textarea>
            </div>
        </div>
        <?/*
        <div class="col-xs-12 col-sm-6">
            <div class="m-b">
                <label class="form-label"><?=Loc::GetMessage('FILE', [], $arParams['LANG'])?></label>
                <input type="file" name="file" id="file" class="rbr2018-inputfile" />
                <label for="file"><?=Loc::GetMessage('CHOOSE_FILE', [], $arParams['LANG'])?></label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <p>
                Вы можете загрузить файл размером до 5 Mb и расширением ...
            </p>
        </div>*/?>
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
