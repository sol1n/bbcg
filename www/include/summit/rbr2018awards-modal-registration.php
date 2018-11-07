<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
?>

<div class="registration-modal-logo">
    <img src="/assets/images/summits-logo/retail-business-russia-label.svg" alt="RETAIL BUSINESS RUSSIA">
</div>
<div class="registration-modal-title ">
    RETAIL BUSINESS RUSSIA AWARDS 2018
</div>
<div class="registration-modal-subtitle">
    Заявка на участие
</div>

<form action="/api/rbr2018awards/" method="POST" class="summit-registration-block-form" data-validate data-form-ajax>
    <input type="hidden" name="from" value="rbr2018awards">
    <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="m-b">
                <label class="form-label">
                    Выберите номинацию
                </label>
                <div class="form-select">
                    <select name="nomination">
                        <option value="team_z">Команда Z</option>
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
                    Компания
                </label>
                <input type="text" name="company" class="form-input" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="m-b">
                <label class="form-label">
                    Контактные данные (email, телефон)
                </label>
                <textarea name="contacts" class="form-input" required></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <div class="m-b">
                <label class="form-label">
                    Объясните, почему ваша компания заслуживает этой награды
                </label>
                <textarea name="why_deserves" class="form-input" required></textarea>
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
            Подать заявку
        </button>
    </div>
</form>
