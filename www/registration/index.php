<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>

<div class="wrapper">
    <div class="m-t-lg">
        <div class="registration-modal-title">
            Регистрация
        </div>

        <form action="/api/registration/" method="POST" enctype="multipart/form-data" class="main-reg-form registration-form registration-modal-form" data-validate data-form-ajax data-form-ajax-overlay="#registration-form-overlay" data-crm-token="main-reg-form">
            <div id="registration-form-overlay" class="form-overlay"></div>
            <input type="text" name="full_name" class="form-input hidden">
            <input type="text" name="event" class="form-input hidden" value="Регистрация на сайте">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <label class="form-label" for="registration-form-last-name">Фамилия *</label>
                        <input id="registration-form-last-name" type="text" name="last_name" class="form-input" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <label class="form-label" for="registration-form-name">Имя *</label>
                        <input id="registration-form-name" type="text" name="first_name" class="form-input" required>
                        <div class="form-control-errors"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <label class="form-label" for="registration-form-middle-name">Отчество</label>
                        <input id="registration-form-middle-name" type="text" name="middle_name" class="form-input">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label class="form-label" for="registration-form-email">Электронная почта *</label>
                        <input id="registration-form-email" type="email" name="email" class="form-input" placeholder="example@mail.ru" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label class="form-label" for="registration-form-phone">Телефон *</label>
                        <input id="registration-form-phone" type="text" name="phone" class="form-input" placeholder="+7 (999) 999-99-99" data-masked-input="+7 (000) 000-00-00" data-masked-input-placeholder="+7 (___) ___-__-__" data-masked-input-clearifnotmatch required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label class="form-label" for="registration-form-organisation">Организация</label>
                        <input id="registration-form-organisation" type="text" name="organisation" class="form-input">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label class="form-label" for="registration-form-title">Должность</label>
                        <input id="registration-form-title" type="text" name="title" class="form-input">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-messages animated flash js-form-messages"></div>
            </div>

            <div class="form-group">
                <div class="form-control form-control-checkbox">
                    <label for="registration-form-agreement">
                        Нажимая кнопку «Зарегистрироваться», <br> я принимаю условия <a href="/eula/" target="_blank">Пользовательского соглашения</a>.
                    </label>
                </div>
            </div>

            <div id="recaptcha-placeholder" data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>

            <div class="registration-form-submit">
                <button type="submit" class="button button-light-burgundy">
                    Зарегистрироваться
                </button>
            </div>
        </form>
    </div>
</div>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
