<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>

<?$arResult['REGISTRATION_URL'] = "/include/summit/missretail-modal-registration.php";?>

<section class="programs-block p-b-xl">
             <a
                 href="#"
                 data-side-modal
                 data-side-modal-url="<?=$arResult['REGISTRATION_URL']?>"
                 data-side-modal-class="registration-modal"
                 data-side-modal-prevent-overlay-close
                 data-side-modal-prevent-esc-close
                 class="button button-old-gold button-large-academy"
             >
                 <span class="c-text">
                     Регистрация Миис Ритейл
                 </span>
             </a>
</section>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
