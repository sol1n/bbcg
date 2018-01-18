<div class="login-modal-title">
    Login
</div>

<form action="/api/login/" method="POST" class="login-modal-form" data-validate data-form-ajax data-form-ajax-overlay="#login-form-overlay">
    <div id="login-form-overlay" class="form-overlay"></div>
    <div class="form-group">
        <label for="login-modal-login" class="form-label">E-mail</label>
        <input id="login-modal-login" type="text" name="login" class="form-input" required>
    </div>

    <div class="form-group">
        <label for="login-modal-password" class="form-label">Password</label>
        <input id="login-modal-password" type="password" name="password" class="form-input" minlength="6" required>
    </div>

    <div class="form-group">
        <div class="form-messages animated flash js-form-messages"></div>
    </div>

    <div class="form-group">
        <button type="submit" class="button button-light-burgundy button-block">Login</button>
    </div>

    <div class="login-modal-links m-t-lg m-b-sm text-center">
        <a href="/en/forgot/" data-side-modal data-side-modal-url="/en/include/blocks/modal-password-recover.php" data-side-modal-class="login-modal">
            Forgot your password?
        </a>
    </div>
</form>
