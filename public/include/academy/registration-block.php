<section id="summit-registration-block" class="summit-registration-block">
    <div class="wrapper">
        <div class="summit-registration-block-title p-t-xxl">
            Оставьте заявку на обучение
        </div>

        <div class="summit-registration-block-row">
            <div class="summit-registration-block-left">
                <form action="/api/academy/" method="POST" class="summit-registration-block-form" data-validate data-form-ajax>
                    <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>
                    
                    <div class="summit-registration-block-form-title">
                        Регистрация
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="m-b">
                                <label class="form-label">
                                    Фамилия
                                </label>
                                <? if (isset($user['LAST_NAME'])): ?>
                                    <input type="text" name="surname" class="form-input" value="<?=$user['LAST_NAME']?>" required>
                                <? else: ?>
                                    <input type="text" name="surname" class="form-input" required>
                                <? endif ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="m-b">
                                <label class="form-label">
                                    Имя
                                </label>
                                <? if (isset($user['NAME'])): ?>
                                    <input type="text" name="name" class="form-input" value="<?=$user['NAME']?>" required>
                                <? else: ?>
                                    <input type="text" name="name" class="form-input" required>
                                <? endif ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="m-b">
                                <label class="form-label">
                                    Номер телефона
                                </label>
                                <? if (isset($user['PERSONAL_PHONE'])): ?>
                                    <input type="text" name="phone" class="form-input" placeholder="+7 (999) 999-99-99" data-masked-input="+7 (000) 000-00-00" data-masked-input-placeholder="+7 (___) ___-__-__" data-masked-input-clearifnotmatch value="<?=$user['PERSONAL_PHONE']?>" required>
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
                                <? if (isset($user['EMAIL'])): ?>
                                    <input type="email" name="email" class="form-input" value="<?=$user['EMAIL']?>" required>
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
                                <? if (isset($user['WORK_COMPANY'])): ?>
                                    <input type="text" name="company" class="form-input" value="<?=$user['WORK_COMPANY']?>" required>
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
                                <? if (isset($user['WORK_POSITION'])): ?>
                                    <input type="text" name="title" class="form-input" value="<?=$user['WORK_POSITION']?>" required>
                                <? else: ?>
                                    <input type="text" name="title" class="form-input" required>
                                <? endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="submit-registration-block-form-footer">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="submit-registration-block-form-manager">
                                    С вами свяжется Ирина Чиннова, для уточнения
                                    деталей в течение 2-х дней
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <button type="submit" class="button button-red">
                                    Зарегистрироваться
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="summit-registration-block-right">
                <div class="summit-registration-block-right-title">
                    Альтернативные способы регистрации
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