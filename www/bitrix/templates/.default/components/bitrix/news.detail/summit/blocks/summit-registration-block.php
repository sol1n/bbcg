<?
    use \Bitrix\Main\Localization\Loc;
    $options = Array("O_ALREADY", "O_CALL", "O_RECOMMENDATION", "O_EMAIL", "O_FACEBOOK", "O_ADVERTISING", "O_MASSMEDIA", "O_OTHER");
?>
<? if(strtotime($now_date) < strtotime($end_date))://variables from about-summit-block.php(summit news.detail) ?>
    <section id="summit-registration-block" class="summit-registration-block">
        <div class="wrapper">
            <div class="summit-registration-block-title p-t-xxl">
                <?=Loc::GetMessage('REGISTRATION', [], $arParams['LANG'])?>
            </div>

            <div class="summit-registration-block-row">
                <div class="summit-registration-block-left">
                    <? if(!empty($arResult['PROPERTIES']['TIMEPAD']['VALUE'])): ?>
                        <?php include $_SERVER['DOCUMENT_ROOT'] . "/include/timepad/id-".$arResult['PROPERTIES']['TIMEPAD']['VALUE'].".php"; ?>
                        <div class="c-white">
                            <h1 class="about-summit-block-title">
                                <?=$arResult['NAME']?>
                            </h1>
                            <div class="about-summit-block-date">
                                <?=$arResult['DURATION']?>
                            </div>
                            <br />
                            <div class="about-summit-block-date">
                                <?=$arResult['PROPERTIES']['ADDRESS']['VALUE']?>
                            </div>
                            <div class="about-summit-block-button">
                                <button class="button button-<?=$arResult['PROPERTIES']['COLOR']['VALUE']?>" id="timepad_twf_register_<?=$arResult['PROPERTIES']['TIMEPAD']['VALUE']?>">
                                    <?=Loc::GetMessage('REGISTRATION', [], $arParams['LANG'])?>
                                </button>
                            </div>
                        </div>
                    <? else: ?>
                        <form action="/api/summit/registration/" method="POST" class="summit-registration-block-form" data-validate data-form-ajax data-crm-token="summit-reg-form">
                            <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>
                            <input name="summit" value="<?=$arResult['ID']?>" type="hidden">
                            <div class="summit-registration-block-form-title">
                                <?=Loc::GetMessage('REGISTRATION', [], $arParams['LANG'])?> «<?=$arResult['NAME']?>»
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="m-b">
                                        <label class="form-label">
                                            <?=Loc::GetMessage('FULL_NAME', [], $arParams['LANG'])?>
                                        </label>
                                        <? if ((isset($arParams['USER']['LAST_NAME']))&&(isset($arParams['USER']['NAME']))): ?>
                                            <input type="text" name="full_name" class="form-input" value="<?=$arParams['USER']['LAST_NAME']?> <?=$arParams['USER']['NAME']?> <?=$arParams['USER']['SECOND_NAME']?>" required>
                                        <? else: ?>
                                            <input type="text" name="full_name" class="form-input" required>
                                        <? endif ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="m-b">
                                        <label class="form-label">
                                            <?=Loc::GetMessage('PHONE', [], $arParams['LANG'])?>
                                        </label>
                                        <? if (isset($arParams['USER']['PERSONAL_PHONE'])): ?>
                                            <input type="text" name="phone" class="form-input" placeholder="+7 (999) 999-99-99" value="<?=$arParams['USER']['PERSONAL_PHONE']?>" required>
                                        <? else: ?>
                                            <input type="text" name="phone" class="form-input" placeholder="+7 (999) 999-99-99" required>
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
                                <div class="col-xs-12 col-sm-6">
                                    <div class="m-b">
                                        <label class="form-label">
                                            <?=Loc::GetMessage('PROMO_CODE', [], $arParams['LANG'])?>
                                        </label>
                                        <input type="text" name="promocode" class="form-input">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="m-b">
                                        <label class="form-label">
                                            <?=Loc::GetMessage('HOW_DID_YOU_HEAR_ABOUT_US', [], $arParams['LANG'])?>
                                        </label>
                                        <div class="form-select">
                                            <select name="summit_reg_select">
                                                <? foreach($options as $option): ?>
                                                    <option value="<?=strtolower($option);?>"><?=Loc::GetMessage($option, [], $arParams['LANG'])?></option>
                                                <? endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="m-t-md">
                                        <div class="submit-registration-block-form-hint">
                                            <?=Loc::GetMessage('WE_WILL_CONTACT_YOU', ['NAME' => $arResult['CONTACT']['PROPERTY_FIO_VALUE']], $arParams['LANG'])?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 hidden" name="other_container">
                                    <div class="m-b">
                                        <label class="form-label">
                                            <?=Loc::GetMessage('OTHER', [], $arParams['LANG'])?>
                                        </label>
                                        <input type="text" name="other" class="form-input" required>
                                    </div>
                                </div>
                                <input type="hidden" id="summit_name" value="<?=$arResult['NAME']?>"/>
                            </div>
                            <div class="submit-registration-block-form-footer">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-sm-offset-6">
                                        <button id="summit-reg-submit" type="submit" class="button button-<?=$arResult['PROPERTIES']['COLOR']['VALUE']?>">
                                            <?=Loc::GetMessage('REGISTRATION', [], $arParams['LANG'])?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <? endif ?>
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
                            <? if(!empty($arResult['PROPERTIES']['ALT_REG_PHONE']['VALUE'])): ?>
                                <a href="tel:<?=$arResult['PROPERTIES']['ALT_REG_PHONE']['DESCRIPTION'] ?>" onclick="return gtag_report_conversion('tel:<?=$arResult['PROPERTIES']['ALT_REG_PHONE']['DESCRIPTION'] ?>');"><?=$arResult['PROPERTIES']['ALT_REG_PHONE']['VALUE'] ?></a> <br>
                            <? else: ?>
                                <a href="tel:+74957852206" onclick="return gtag_report_conversion('tel:+74957852206');">+7 (495) 785-22-06</a> <br>
                            <? endif ?>
                        </div>
                        <?=Loc::GetMessage('CONTACT_PERSON', [], $arParams['LANG'])?>
                        <? if(!empty($arResult['PROPERTIES']['ALT_REG_PERSON']['VALUE'])): ?>
                            <? if($arParams['LANG'] == 'en'): ?>
                                <?=$arResult['PROPERTIES']['EN_ALT_REG_PERSON']['VALUE'] ?>
                            <? else: ?>
                                <?=$arResult['PROPERTIES']['ALT_REG_PERSON']['VALUE'] ?>
                            <? endif ?>
                        <? else: ?>
                            <?=Loc::GetMessage('CONTACT_PERSON_NAME', [], $arParams['LANG'])?>
                        <? endif ?>
                    </div>

                    <div class="summit-registration-block-card">
                        <div class="summit-registration-block-card-icon">
                            <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-contacts-email-white.svg"); ?>
                        </div>
                        <div class="summit-registration-block-card-value">
                            <? if(!empty($arResult['PROPERTIES']['ALT_REG_EMAIL']['VALUE'])): ?>
                                <a href="mailto:<?=$arResult['PROPERTIES']['ALT_REG_EMAIL']['VALUE'] ?>"><?=$arResult['PROPERTIES']['ALT_REG_EMAIL']['VALUE'] ?></a>
                            <? else: ?>
                                <a href="mailto:iren@b2bcg.ru">iren@b2bcg.ru</a>
                            <? endif ?>
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
<? endif; ?>
