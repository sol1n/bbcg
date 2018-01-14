<div class="login-modal-title">
    Восстановление пароля
</div>

<form action="/api/password-restore/" method="POST" class="login-modal-form" data-form-ajax="" data-validate="" novalidate="novalidate">
    <div class="form-group">
        <label for="login-modal-login" class="form-label">Логин</label>
        <input id="login-modal-login" name="email" class="form-input" autofocus="" required="" type="text">
    </div>

    <div class="form-group">
        <p>Вернуться к <a data-side-modal data-side-modal-url="/include/blocks/modal-login.php" data-side-modal-class="login-modal" href="/login/">авторизации</a></p>
    </div>

    <div class="form-group">
        <div class="form-messages animated flash js-form-messages"></div>
    </div>

    <div class="form-group">
        <button type="submit" class="button button-light-burgundy button-block">Восстановить</button>
    </div>
</form>
