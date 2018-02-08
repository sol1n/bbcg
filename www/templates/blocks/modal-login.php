<div class="login-modal-title">
    Войти на сайт
</div>

<form action="#" method="POST" class="login-modal-form" data-validate data-form-ajax-overlay="#login-form-overlay">
    <div id="login-form-overlay" class="form-overlay"></div>
    <div class="form-group">
        <label for="login-modal-login" class="form-label">Логин</label>
        <input id="login-modal-login" type="text" class="form-input" required>
    </div>

    <div class="form-group">
        <label for="login-modal-password" class="form-label">Пароль</label>
        <input id="login-modal-password" type="password" class="form-input" minlength="6" required>
    </div>

    <div class="form-group">
        <div class="form-messages animated flash js-form-messages"></div>
    </div>

    <div class="form-group">
        <button type="submit" class="button button-light-burgundy button-block">Войти</button>
    </div>

    <div class="login-modal-links m-t-lg m-b-sm text-center">
        <a href="password-recover.php" data-side-modal data-side-modal-url="blocks/modal-password-recover.php" data-side-modal-class="login-modal">
            Забыли пароль?
        </a>
    </div>
</form>
