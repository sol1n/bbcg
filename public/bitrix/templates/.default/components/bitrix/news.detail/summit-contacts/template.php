<div class="main-heading main-heading-<?=$arResult['COLOR']?> program-table-main-heading">
    <div class="wrapper">
        <h1 class="main-heading-title">Контакты</h1>
    </div>
</div>

<? if ($arResult['PROPERTIES']['CONTACTS']['VALUE']): ?>
    <?=$arResult['PROPERTIES']['CONTACTS']['~VALUE']['TEXT']?>
<? else: ?>
    <div class="wrapper">
        <div class="contacts-block m-t-xl m-b-xl">
                <div class="row m-b-lg">
                    <div class="col-xs-12 col-sm-4">
                        <div class="contacts-block-item">
                            <div class="contacts-block-item-icon">
                                <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-contacts-place.svg'); ?>
                            </div>
                            <div class="contacts-block-item-content">
                                <div class="contacts-block-item-title">
                                    Наш новый физический адрес
                                </div>
                                <div class="contacts-block-item-value">
                                    115114, г. Москва, Дербеневская наб., д. 11, БЦ «Полларс», корпус Б, офис Б-504
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="contacts-block-item">
                            <div class="contacts-block-item-icon">
                                <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-contacts-phone.svg'); ?>
                            </div>
                            <div class="contacts-block-item-content">
                                <div class="contacts-block-item-title">
                                    Контактная информация
                                </div>
                                <div class="contacts-block-item-value">
                                    Тел/факс: <a href="tel:+74957852206">(495) 785-22-06</a>, <a href="tel:+74957811134">(495) 781-11-34</a> <br>
                                    email: <a href="mailto:info@b2bcg.ru">info@b2bcg.ru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="contacts-block-item">
                            <div class="contacts-block-item-icon">
                                <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-contacts-manager.svg'); ?>
                            </div>
                            <div class="contacts-block-item-content">
                                <div class="contacts-block-item-title">
                                    Предложения о сотрудничестве
                                </div>
                                <div class="contacts-block-item-value">
                                    <span class="contacts-block-item-value-title">email:</span> <a href="mailto:info@b2bcg.ru">info@b2bcg.ru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <? $APPLICATION->IncludeFile('/include/blocks/contacts-map.php'); ?>

    <div class="feedback-block">
        <div class="wrapper">
            <form action="/api/feedback/" method="POST" class="feedback-block-form" data-validate data-form-ajax>
                <div class="feedback-block-title">
                    Обратная связь
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="feedback-form-name" class="form-label">Имя *</label>
                            <? if (isset($user['NAME']) || isset($user['LAST_NAME'])): ?>
                                <? $username = trim($user['LAST_NAME'] . ' ' . $user['NAME']); ?>
                                <input id="feedback-form-name" type="text" class="form-input" name="name" value="<?=$username?>" required placeholder="Иван Иванов">
                            <? else: ?>
                                <input id="feedback-form-name" type="text" class="form-input" name="name" required placeholder="Иван Иванов">
                            <? endif ?>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="feedback-form-email" class="form-label">E-mail *</label>
                            <? if (isset($user['EMAIL'])): ?>
                                <input id="feedback-form-email" type="email" class="form-input" name="email" value="<?=$user['EMAIL']?>" required placeholder="ivanov@mail.ru">
                            <? else: ?>
                                <input id="feedback-form-email" type="email" class="form-input" name="email" required placeholder="ivanov@mail.ru">
                            <? endif ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="feedback-form-message" class="form-label">Ваше сообщение *</label>
                    <textarea id="feedback-form-message" class="form-textarea" name="message" cols="30" rows="10" placeholder="Напишите ваше сообщение" required></textarea>
                </div>

                <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>
                
                <div class="feedback-block-submit">
                    <button type="submit" class="button button-light-burgundy">
                        Отправить
                    </button>
                </div>
            </form>
        </div>
    </div>
<? endif ?>