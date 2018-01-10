<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?> 

<div class="main-heading main-heading-black">
    <div class="wrapper">
        <h1 class="main-heading-title">
            <a href="/personal/">
                Личный кабинет
            </a>
        </h1>
    </div>
</div>

<nav class="subnav">
    <div class="wrapper">
        <ul class="subnav-list">
            <li class="subnav-list-item">
                <a href="/personal/" class="subnav-link">
                    <span>Мои данные</span>
                </a>
            </li>
            <li class="subnav-list-item active">
                <a href="/personal/password/" class="subnav-link">
                    <span>Безопасность</span>
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
                    Безопасность
                </div>
            </div>

            <? if ($_SESSION['success']): ?>
                <p>Пароль успешно изменен</p>
                <? unset($_SESSION['success']); ?>
            <? endif ?>

            <? if ($_SESSION['error']): ?>
                <p>Ошибка изменения пароля</p>
                <? unset($_SESSION['error']); ?>
            <? endif ?>

            <form action="/api/password/" method="POST">
                <div class="form-group">
                    <label for="cabinet-new-password" class="form-label">
                        Новый пароль
                    </label>
                    <input id="cabinet-new-password" type="password" class="form-input" name="new_password" minlength="6" required>
                </div>

                <div class="form-group">
                    <label for="cabinet-new-password-2" class="form-label">
                        Подтвердите новый пароль
                    </label>
                    <input id="cabinet-new-password-2" type="password" class="form-input" name="new_password2" minlength="6" required>
                </div>

                <button type="submit" class="button button-light-burgundy">
                    Сохранить
                </button>
            </form>
        </div>
    </div>
</div>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>