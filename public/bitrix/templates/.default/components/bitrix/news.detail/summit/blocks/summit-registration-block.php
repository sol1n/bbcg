<section class="summit-registration-block">
    <div class="wrapper">
        <div class="summit-registration-block-title">
            Регистрация
        </div>

        <div class="summit-registration-block-row">
            <div class="summit-registration-block-left">
                <form action="/api/summit/registration/" method="POST" class="summit-registration-block-form" data-validate data-form-ajax>
                    <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>
                    <input name="summit" value="<?=$arResult['ID']?>" type="hidden">
                    <div class="summit-registration-block-form-title">
                        Форма регистрации на саммите «<?=$arResult['NAME']?>»
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="m-b">
                                <label class="form-label">
                                    Имя
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
                                    Фамилия
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
                                    Номер телефона
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
                                    E-mail
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
                                    Компания
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
                                    Должность
                                </label>
                                <? if (isset($arParams['USER']['WORK_POSITION'])): ?>
                                    <input type="text" name="title" class="form-input" value="<?=$arParams['USER']['WORK_POSITION']?>" required>
                                <? else: ?>
                                    <input type="text" name="title" class="form-input" required>
                                <? endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="submit-registration-block-form-footer">
                        <div class="row">
                            <? if ($arResult['CONTACT']): ?>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="submit-registration-block-form-manager">
                                        <div class="submit-registration-block-form-manager-photo">
                                            <? $img = CFile::ResizeImageGet($arResult['CONTACT']['PREVIEW_PICTURE'], ['width' => 96*2, 'height' => 96*2], BX_RESIZE_IMAGE_EXACT); ?>
                                            <img src="<?=$img['src']?>" alt="<?=$arResult['CONTACT']['PROPERTY_FIO_VALUE']?>">
                                        </div>
                                        С вами свяжется <?=$arResult['CONTACT']['PROPERTY_FIO_VALUE']?>, для уточнения
                                        деталей в течение 2-х дней
                                    </div>
                                </div>
                            <? endif ?>
                            <div class="col-xs-12 col-sm-6">
                                <button type="submit" class="button button-blue">Регистрация</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="summit-registration-block-right">
                <div class="summit-registration-block-right-title">
                    Альтернативные
                    способы регистрации
                </div>
                <div class="summit-registration-block-card">
                    <div class="summit-registration-block-card-icon">
                        <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-contacts-phone-white.svg"); ?>
                    </div>
                    <div class="summit-registration-block-card-value">
                        <a href="tel:+74957852206">+7 (495) 785-22-06</a> <br>
                        или <a href="tel:7811134">781-11-34</a>
                    </div>

                    контактное лицо Ирина Чиннова
                </div>

                <div class="summit-registration-block-card">
                    <div class="summit-registration-block-card-icon">
                        <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-contacts-email-white.svg"); ?>
                    </div>
                    <div class="summit-registration-block-card-value">
                        <a href="mailto:iren@b2bcg.ru">iren@b2bcg.ru</a>
                    </div>

                    Скачать заявку и отправить
                    на указанную почту
                </div>
            </div>
        </div>
    </div>
</section>