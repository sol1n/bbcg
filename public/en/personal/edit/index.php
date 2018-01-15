<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?> 

<div class="main-heading main-heading-black">
    <div class="wrapper">
        <h1 class="main-heading-title">
            <a href="/en/personal/">
                Personal area
            </a>
        </h1>
    </div>
</div>

<nav class="subnav">
    <div class="wrapper">
        <ul class="subnav-list">
            <li class="subnav-list-item active">
                <a href="/en/personal/" class="subnav-link">
                    <span>My data</span>
                </a>
            </li>
            <li class="subnav-list-item">
                <a href="/en/personal/password/" class="subnav-link">
                    <span>Security</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="wrapper">
    <div class="m-t-lg">
        <div class="registration-modal-title">
            Editing a profile
        </div>

        <form action="/api/personal/" method="POST" enctype="multipart/form-data" class="registration-form registration-modal-form" data-validate data-form-ajax data-form-ajax-overlay="#registration-form-overlay">
            <div id="registration-form-overlay" class="form-overlay"></div>
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <label class="form-label" for="registration-form-name">Name *</label>
                        <input id="registration-form-name" type="text" name="first_name" class="form-input" value="<?=$user['NAME']?>" required>
                        <div class="form-control-errors"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <label class="form-label" for="registration-form-last-name">Surname *</label>
                        <input id="registration-form-last-name" type="text" name="last_name" class="form-input" value="<?=$user['LAST_NAME']?>" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <label class="form-label" for="registration-form-middle-name">Middlename</label>
                        <input id="registration-form-middle-name" type="text" name="middle_name" class="form-input" value="<?=$user['SECOND_NAME']?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label class="form-label" for="registration-form-email">E-mail *</label>
                        <input id="registration-form-email" type="email" name="email" class="form-input" value="<?=$user['EMAIL']?>" placeholder="example@mail.ru" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label class="form-label" for="registration-form-phone">Phone *</label>
                        <input id="registration-form-phone" type="text" name="phone" class="form-input" placeholder="+7 (999) 999-99-99" data-masked-input="+7 (000) 000-00-00" data-masked-input-placeholder="+7 (___) ___-__-__" data-masked-input-clearifnotmatch value="<?=$user['PERSONAL_PHONE']?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label class="form-label" for="registration-form-organisation">Company</label>
                        <input id="registration-form-organisation" type="text" name="organisation" class="form-input" value="<?=$user['WORK_COMPANY']?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label class="form-label" for="registration-form-title">Position</label>
                        <input id="registration-form-title" type="text" name="title" class="form-input" value="<?=$user['WORK_POSITION']?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-messages animated flash js-form-messages"></div>
            </div>

            <div class="registration-form-submit">
                <button type="submit" class="button button-light-burgundy">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>