<header class="main-header main-header-with-global">
    <div class="wrapper">
        <a href="#" class="main-header-toggler js-offcanvas">
            <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-hamburger-menu.svg"); ?>
        </a>
        <div class="main-header-logo">
            <a href="/en/academy/">
                <img src="/assets/images/retail-academy-horizontal.svg" alt="Retail academy — BBCG">
            </a>
        </div>
        <div class="main-header-mobile-logo">
            <a href="/en/academy/">
                <img src="/assets/images/retail-academy-horizontal.svg" alt="Retail academy — BBCG" height="34">
            </a>
        </div>
        
        <?$APPLICATION->IncludeComponent("bitrix:menu", "main-header-menu", Array("ROOT_MENU_TYPE" => "academy"), false);?>

        <? if ($USER->IsAuthorized()): ?>
            <div class="main-header-userarea">
                <div class="main-header-user">
                    <div class="main-header-user-name">
                    <? if (!empty($user['LAST_NAME']) || !empty($user['NAME'])): ?>
                        <?=$user['NAME']?><br><?=$user['LAST_NAME']?>
                    <? else: ?>
                        <?=$user['LOGIN']?>
                    <? endif ?>
                    </div>
                    <div class="main-header-user-toggler"></div>

                    <div class="main-header-user-dropdown-wrapper">
                        <div class="main-header-user-dropdown">
                            <ul class="main-header-user-dropdown-menu">
                                <li>
                                    <a href="/en/personal/">My profile</a>
                                </li>
                                <li class="main-header-user-dropdown-menu-divider"></li>
                                <li>
                                    <a href="/en/?logout=yes" onclick="return confirm('Do you really want to logout?');">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-header-userarea-mobile">
                <div class="main-header-user">
                    <div class="main-header-user-photo">
                        <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-header-user.svg"); ?>
                    </div>

                    <div class="main-header-user-dropdown-wrapper">
                        <div class="main-header-user-dropdown">
                            <ul class="main-header-user-dropdown-menu">
                                <li>
                                    <a href="/en/personal/">My profile</a>
                                </li>
                                <li class="main-header-user-dropdown-menu-divider"></li>
                                <li>
                                    <a href="/en/?logout=yes" onclick="return confirm('Do you really want to logout?');">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <? else: ?>
            <div class="main-header-userarea">
                <div class="main-header-userarea-login-register">
                    <a href="/en/login/" data-side-modal data-side-modal-url="/en/include/blocks/modal-login.php" data-side-modal-class="login-modal" data-side-modal-class="login-modal">
                        Login
                    </a>
                    <a href="/en/registration/" data-side-modal data-side-modal-prevent-mobile data-side-modal-url="/en/include/blocks/modal-registration.php" data-side-modal-class="registration-modal" data-side-modal-prevent-overlay-close data-side-modal-prevent-esc-close>
                        Registration
                    </a>
                </div>
            </div>

            <a href="/en/login/" data-side-modal data-side-modal-url="/en/include/blocks/modal-login.php" data-side-modal-class="login-modal" class="main-header-userarea-mobile">
                <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-header-login.svg') ?>
            </a>
        <? endif ?>
    </div>
</header>