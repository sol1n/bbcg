<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
?>
<div class="registration-modal-logo">
    <img src="/assets/images/logo.svg" alt="BBCG">
</div>

<div class="registration-modal-title">
    Subscribe to newsletter
</div>

<form action="/api/registration/" method="POST" enctype="multipart/form-data" class="subscribe-form registration-form registration-modal-form" data-validate data-form-ajax data-form-ajax-overlay="#registration-form-overlay" data-crm-token="subscribe-form">
    <div id="registration-form-overlay" class="form-overlay"></div>
    <input type="text" name="full_name" class="form-input hidden">
    <input type="text" name="event" class="form-input hidden" value="Подписка на рассылку">
    <div class="row">
        <div class="col-xs-12 col-sm-4">
            <div class="form-group">
                <label class="form-label" for="registration-form-last-name">Surname *</label>
                <input id="registration-form-last-name" type="text" name="last_name" class="form-input" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="form-group">
                <label class="form-label" for="registration-form-name">Name *</label>
                <input id="registration-form-name" type="text" name="first_name" class="form-input" required>
                <div class="form-control-errors"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="form-group">
                <label class="form-label" for="registration-form-middle-name">Middlename</label>
                <input id="registration-form-middle-name" type="text" name="middle_name" class="form-input">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <label class="form-label" for="registration-form-email">E-mail *</label>
                <input id="registration-form-email" type="email" name="email" class="form-input" placeholder="example@mail.ru" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <label class="form-label" for="registration-form-phone">Phone *</label>
                <input id="registration-form-phone" type="text" name="phone" class="form-input" placeholder="+7 (999) 999-99-99" data-masked-input="+7 (000) 000-00-00" data-masked-input-placeholder="+7 (___) ___-__-__" data-masked-input-clearifnotmatch required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <label class="form-label" for="registration-form-organisation">Company</label>
                <input id="registration-form-organisation" type="text" name="organisation" class="form-input">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <label class="form-label" for="registration-form-title">Position</label>
                <input id="registration-form-title" type="text" name="title" class="form-input">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <label class="form-label" for="registration-form-type">Company type</label>
                <div class="form-select">
                    <select name="type" id="registration-form-type">
                        <option value="Ритейл">Retail</option>
                        <option value="Другое">Other</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <label class="form-label" for="registration-form-work">Field of activity</label>
                <div class="form-select" id="registration-form-work">
                    <select name="work">
                        <option value="Не выбрано">Not chosen</option>
                        <option value="Food (торговля, производство продуктов питания и товаров fmcg)">Food (trade, food and fmcg)</option>
                        <option value="DIY (торговля, производство товаров для строительства, ремонта и дома)">DIY (trade, manufacture of goods for construction, repair and home)</option>
                        <option value="Fashion (торговля, производство одежды, обуви, аксессуаров)">Fashion (trade, clothing, footwear, accessories)</option>
                        <option value="Drogerie (торговля, производство косметики, бытовой химии)">Drogerie ( of cosmetics, household chemicals)</option>
                        <option value="Electronics & mobile (торговля, производство БТиЭ)">Electronics & mobile (trade, manufacture)</option>
                        <option value="Jewelry (торговля, производство ювелирных изделий)">Jewelry (trade, manufacture of jewelry)</option>
                        <option value="Baby (торговля, производство товаров для детей)">Baby (trade, production of goods for children)</option>
                        <option value="B2B-компания (IT, логистика, оборудование, услуги и т.д.)">B2B-company (IT, logistics, equipment, services, etc.)</option>
                        <option value="Другое">Other</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="form-messages animated flash js-form-messages"></div>
    </div>

    <div class="form-group">
        <div class="form-control form-control-checkbox">
            <input name="mailing" type="checkbox" id="registration-form-mailing" checked>
            <label for="registration-form-mailing">
                Subscribe to the mailing list
            </label>
        </div>
    </div>

    <div class="form-group">
        <div class="form-control form-control-checkbox">
            <label for="registration-form-agreement">
                By clicking the "Subscribe" button, I accept the conditions <a href="/en/eula/" target="_blank">User&nbsp;agreements</a> and I consent to the processing of personal data.
            </label>
        </div>
    </div>

    <div id="recaptcha-placeholder" data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>

    <div class="registration-form-submit">
        <button type="submit" class="button button-light-burgundy g-recaptcha">Subscribe</button>
    </div>
</form>
