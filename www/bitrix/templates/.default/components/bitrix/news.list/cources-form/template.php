<?
    use \Bitrix\Main\Localization\Loc;
?>
<section id="summit-registration-block" class="summit-registration-block">
    <div class="wrapper">
        <div class="summit-registration-block-title p-t-xxl">
            <?=$arParams['TITLE']?>
        </div>

        <? $user = $arParams['USER']; ?>

        <div class="summit-registration-block-row">
            <div class="summit-registration-block-left">
                <form action="<?=$arResult['REGISTRATION_URL']?>" method="POST" class="academy-form summit-registration-block-form" data-validate data-form-ajax data-crm-token="academy-form">
                    <input type="hidden" name="from" value="retail-academy">
                    <input type="text" name="full_name" class="form-input hidden">
                    <input type="text" name="event" class="form-input hidden" value="Академия ритейла">
                    <input type="text" name="lang" class="form-input hidden" value="<?=$arParams['LANG']?>">
                    <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>

                    <div class="summit-registration-block-form-title">
                        <?=Loc::GetMessage('REGISTRATION', [], $arParams['LANG'])?>
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
                        <div class="col-xs-12 col-sm-12">
                            <div class="m-b">
                                <label class="form-label">
                                    <?=Loc::GetMessage('CHOOSE_PROGRAM', [], $arParams['LANG'])?>
                                </label>
                                <div class="form-select">
                                    <select name="program">
                                        <? foreach ($arResult['ITEMS'] as $item): ?>
                                            <?
                                            $end = FormatDate('d.m', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                                            $begin = FormatDate('d.m', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

                                            if ($begin == $end) {
                                                //One-day course
                                                if ($arParams['LANG'] == 'en') {
                                                    $day = PHPFormatDateTime($item["PROPERTIES"]['END']['VALUE'], 'j');
                                                    $month = mb_strtolower(PHPFormatDateTime($item["PROPERTIES"]['BEGIN']['VALUE'], 'F'));
                                                } else {
                                                    $day = FormatDate('j', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                                                    $month = mb_strtolower(FormatDate('F', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS")));
                                                }
                                                $year = mb_strtolower(FormatDate('Y', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS")));
                                                $format_date = ' ('.$day.' '.$month.' '.$year.')';
                                            } else {
                                                $end = FormatDate('m', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                                                $begin = FormatDate('m', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

                                                if ($begin == $end) {
                                                    //Start and end dates are in one month
                                                    $endDay = FormatDate('j', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                                                    $beginDay = FormatDate('j', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                                                    $days = "$beginDay – $endDay";
                                                    if ($arParams['LANG'] == 'en') {
                                                        $month = mb_strtolower(PHPFormatDateTime($item["PROPERTIES"]['BEGIN']['VALUE'], 'F'));
                                                    } else {
                                                        $month = mb_strtolower(FormatDate('F', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS")));
                                                    }
                                                    $year = mb_strtolower(FormatDate('Y', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS")));
                                                    $format_date = ' ('.$days.' '.$month.' '.$year.')';
                                                } else {
                                                    //Start and end dates are in different months
                                                    $endDay = FormatDate('j', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                                                    $endMonth = FormatDate('F', MakeTimeStamp($item["PROPERTIES"]['END']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                                                    $beginDay = FormatDate('j', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));
                                                    $beginMonth = FormatDate('F', MakeTimeStamp($item["PROPERTIES"]['BEGIN']['VALUE'], "DD.MM.YYYY HH:MI:SS"));

                                                    $format_date = ' ('.$beginDay.' '.$beginMonth.' - '.$endDay.' '.$endMonth.' '.$year.')';
                                                }
                                            }
                                            ?>
                                            <option value="<?=$item['ID']?>"><?=$item['NAME'].$format_date?></option>
                                        <? endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-registration-block-form-footer">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="submit-registration-block-form-hint">
                                    <?=Loc::GetMessage('WE_WILL_CONTACT_YOU', [], $arParams['LANG'])?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <button type="submit" class="button button-red">
                                    <?=Loc::GetMessage('DO_REGISTER', [], $arParams['LANG'])?>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="summit-registration-block-right">
                <div class="summit-registration-block-right-title">
                    <?=Loc::GetMessage('ALTERNAME_REGISTRATION', [], $arParams['LANG'])?>
                </div>
                <div class="summit-registration-block-card">
                    <div class="summit-registration-block-card-icon">
                        <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-contacts-phone-white.svg"); ?>
                    </div>
                    <div class="summit-registration-block-card-value">
                        <a href="tel:+74957852206">+7 (495) 785-22-06</a>
                    </div>
                    <?=Loc::GetMessage('CONTACT_PERSON', [], $arParams['LANG'])?>
                </div>

                <div class="summit-registration-block-card">
                    <div class="summit-registration-block-card-icon">
                        <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-contacts-email-white.svg"); ?>
                    </div>
                    <div class="summit-registration-block-card-value">
                        <a href="mailto:RAcademy@b2bcg.ru">RAcademy@b2bcg.ru</a>
                    </div>
                    <?=Loc::GetMessage('DOWNLOAD_AND_SEND_REQUEST', [], $arParams['LANG'])?>
                </div>
            </div>
        </div>
    </div>
</section>
