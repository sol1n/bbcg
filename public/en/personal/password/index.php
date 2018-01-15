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
            <li class="subnav-list-item">
                <a href="/en/personal/" class="subnav-link">
                    <span>My data</span>
                </a>
            </li>
            <li class="subnav-list-item active">
                <a href="/en/personal/password/" class="subnav-link">
                    <span>Security</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="cabinet-block">
    <div class="wrapper">
        <div class="cabinet-block-profile-wrapper">
            <div class="cabinet-block-heading">
                <div class="cabinet-block-title">
                    Security
                </div>
            </div>

            <form action="/api/password/?lang=en" method="POST" data-validate data-form-ajax>
                <div class="form-group">
                    <label for="cabinet-new-password" class="form-label">
                        New password
                    </label>
                    <input id="cabinet-new-password" type="password" class="form-input" name="new_password" minlength="6" required>
                </div>

                <div class="form-group">
                    <label for="cabinet-new-password-2" class="form-label">
                        Confirm new password
                    </label>
                    <input id="cabinet-new-password-2" type="password" class="form-input" name="new_password2" minlength="6" required>
                </div>

                <div class="form-group">
                    <div class="form-messages animated flash js-form-messages"></div>
                </div>

                <button type="submit" class="button button-light-burgundy">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>