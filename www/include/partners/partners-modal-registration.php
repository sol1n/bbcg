<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
?>

<!-- <div class="registration-modal-logo">
    <img src="/assets/images/summits-logo/retail-business-russia-label.svg" alt="RETAIL BUSINESS RUSSIA">
</div> -->
<div class="registration-modal-title ">
    Стать партнером B2BCG
</div>
<!-- <div class="registration-modal-subtitle">
    Заявка на участие
</div> -->

<form action="/api/partners/" method="POST" class="summit-registration-block-form" data-validate data-form-ajax>
    <input type="hidden" name="from" value="partners">
    <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="m-b">
                <label class="form-label">
                    Компания*
                </label>
                <input type="text" name="company" class="form-input" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="m-b">
                <label class="form-label">
                    ФИО
                </label>
                <input type="text" name="fio" class="form-input">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="m-b">
                <label class="form-label">
                    E-mail*
                </label>
                <input type="email" name="email" placeholder="example@mail.ru" class="form-input" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="m-b">
                <label class="form-label">
                    Телефон
                </label>
                <input type="text" name="phone" placeholder="+7 (999) 999-99-99" class="form-input">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="submit-registration-block-form-hint">
                Нажимая кнопку «Зарегистрироваться», я принимаю условия <a href=\"/eula/\" target=\"_blank\">Пользовательского соглашения</a> и даю согласие на обработку персональных данных.
            </div>
        </div>
    </div>
    <div class="registration-form-submit">
        <button type="submit" class="button button-red">
            Отправить запрос
        </button>
    </div>
</form>
