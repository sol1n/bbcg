<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

$arParams['USER'] = user();
?>

<div class="registration-modal-logo">
    <img src="/assets/images/summits-logo/fashion-retail-business-label.svg" alt="FASHION RETAIL RUSSIA">
</div>

<div class="registration-modal-title m-n">
    Анкета участницы &laquo;Мисс Ритейл 2018&raquo;
</div>

<form action="/api/miss-retail/" method="POST" enctype="multipart/form-data" class="summit-registration-block-form" data-validate data-form-ajax>
    <input type="hidden" name="from" value="miss-retail">
    <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        ФИО
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
                        Контактные данные (email, телефон)
                    </label>
                    <input type="text" name="contacts" class="form-input" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
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
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        Дата рождения
                    </label>
                    <? if (isset($arParams['USER']['PERSONAL_BIRTHDAY'])): ?>
                        <?
                            $bdate = $arParams['USER']['PERSONAL_BIRTHDAY'];
                            $bdate=@date('Y-m-d', strtotime($bdate));
                        ?>
                        <input type="date" name="birthdate" class="form-input" value="<?=$bdate?>" required>
                    <? else: ?>
                        <input type="date" name="birthdate" class="form-input" required>
                    <? endif ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        Образование
                    </label>
                    <input type="text" name="education" class="form-input" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        Должность
                    </label>
                    <? if (isset($arParams['USER']['WORK_POSITION'])): ?>
                        <input type="text" name="position" class="form-input" value="<?=$arParams['USER']['WORK_POSITION']?>" required>
                    <? else: ?>
                        <input type="text" name="position" class="form-input" required>
                    <? endif ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        Почему вы выбрали эту профессию?
                    </label>
                    <textarea name="profession_choice" class="form-input" required></textarea>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        Какие у вас мечты?
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
                        Работа для вас — это
                    </label>
                    <textarea name="work_for_you" class="form-input" required></textarea>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        Ваше хобби
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
                    <label class="form-label">Ваше фото</label>
                    <input class="bg-red" type="file" name="file" id="file" required data-rule-maxFileSize='{"unit": "MB", "size": "15"}' accept="image/x-png,image/bmp,image/jpeg"/>
                    <label for="file">Выберите файл</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <p class="m-t-md">
                        Вы можете загрузить файл размером до 15 MB и расширением .jpg .png .bmp
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <p class="m-t-md" class="errorTxt" name="selected-file"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12">
        <div class="submit-registration-block-form-hint">
            Нажимая кнопку «Зарегистрироваться», я принимаю условия <a href=\"/eula/\" target=\"_blank\">Пользовательского соглашения</a> и даю согласие на обработку персональных данных.
        </div>
    </div>
    <div class="registration-form-submit">
        <button type="submit" class="button button-red">
            Подать заявку
        </button>
    </div>
</form>
