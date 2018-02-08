<div class="login-modal-title">
    Password recovery
</div>

<form action="/api/password-restore/?lang=en" method="POST" class="login-modal-form" data-form-ajax="" data-validate="" novalidate="novalidate">
    <div class="form-group">
        <label for="login-modal-login" class="form-label">E-mail</label>
        <input id="login-modal-login" name="email" class="form-input" autofocus="" required="" type="text">
    </div>

    <div class="form-group">
        <p>Back to <a data-side-modal data-side-modal-url="/en/include/blocks/modal-login.php" data-side-modal-class="login-modal" href="/login/">login</a></p>
    </div>

    <div class="form-group">
        <div class="form-messages animated flash js-form-messages"></div>
    </div>

    <div class="form-group">
        <button type="submit" class="button button-light-burgundy button-block">Send</button>
    </div>
</form>
