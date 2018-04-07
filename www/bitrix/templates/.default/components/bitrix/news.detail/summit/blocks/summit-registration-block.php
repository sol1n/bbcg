<?
    use \Bitrix\Main\Localization\Loc;
?>
<section id="summit-registration-block" class="summit-registration-block">
    <div class="wrapper">
        <div class="summit-registration-block-title p-t-xxl">
            <?=Loc::GetMessage('REGISTRATION', [], $arParams['LANG'])?>
        </div>

        <div class="summit-registration-block-row">
            <div class="summit-registration-block-left">
                <form action="/api/summit/registration/" method="POST" class="summit-registration-block-form" data-validate data-form-ajax>
                    <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>
                    <input name="summit" value="<?=$arResult['ID']?>" type="hidden">
                    <div class="summit-registration-block-form-title">
                        <?=Loc::GetMessage('REGISTRATION', [], $arParams['LANG'])?> «<?=$arResult['NAME']?>»
                    </div>
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
                        <? if ($arResult['ID'] == 1): ?>
                            <div class="col-xs-12 col-sm-6">
                                <div class="m-b">
                                    <label class="form-label">
                                        <?=Loc::GetMessage('PROMO_CODE', [], $arParams['LANG'])?>
                                    </label>
                                    <input type="text" name="promocode" class="form-input">
                                </div>
                            </div>
                        <? endif ?>
                    </div>
                    <div class="submit-registration-block-form-footer">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="submit-registration-block-form-hint">
                                    <?=Loc::GetMessage('WE_WILL_CONTACT_YOU', ['NAME' => $arResult['CONTACT']['PROPERTY_FIO_VALUE']], $arParams['LANG'])?>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <button type="submit" class="button button-<?=$arResult['PROPERTIES']['COLOR']['VALUE']?>">
                                    <?=Loc::GetMessage('REGISTRATION', [], $arParams['LANG'])?>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="summit-registration-block-right">
                <div class="summit-registration-block-right-title">
                    <?=Loc::GetMessage('ALTERNATIVE_REGISTRATION', [], $arParams['LANG'])?>
                </div>
                <div class="summit-registration-block-card">
                    <div class="summit-registration-block-card-icon">
                        <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-contacts-phone-white.svg"); ?>
                    </div>
                    <div class="summit-registration-block-card-value">
                        <a href="tel:+74957852206">+7 (495) 785-22-06</a> <br>
                    </div>
                    <?=Loc::GetMessage('CONTACT_PERSON', [], $arParams['LANG'])?>
                </div>

                <div class="summit-registration-block-card">
                    <div class="summit-registration-block-card-icon">
                        <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-contacts-email-white.svg"); ?>
                    </div>
                    <div class="summit-registration-block-card-value">
                        <a href="mailto:iren@b2bcg.ru">iren@b2bcg.ru</a>
                    </div>
                    <? if ($arResult['PROPERTIES']['REQUEST_FILE']['VALUE']): ?>
                        <? $file = CFile::GetPath($arResult['PROPERTIES']['REQUEST_FILE']['VALUE']); ?>
                        <?=Loc::GetMessage('DOWNLOAD_AND_SEND_REQUEST', ['FILE' => $file], $arParams['LANG'])?>
                    <? endif ?>
                </div>
            </div>
        </div>
    </div>
</section>
