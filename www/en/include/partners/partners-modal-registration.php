<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
?>

<div class="registration-modal-title ">
    Become a B2BCG Partner
</div>
<form action="/api/partners/" method="POST" class="summit-registration-block-form" data-validate data-form-ajax>
    <input type="hidden" name="from" value="partners">
    <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="m-b">
                <label class="form-label">
                    Company*
                </label>
                <input type="text" name="company" class="form-input" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="m-b">
                <label class="form-label">
                    Full name
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
                    Phone
                </label>
                <input type="text" name="phone" placeholder="+7 (999) 999-99-99" class="form-input">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="submit-registration-block-form-hint">
                By clicking the «Registration» button, I accept the <a href="/en/eula/" target="_blank"> terms of the User Agreement</a> and consent to the processing of personal data.
            </div>
        </div>
    </div>
    <div class="registration-form-submit">
        <button type="submit" class="button button-red">
            Send request
        </button>
    </div>
</form>
