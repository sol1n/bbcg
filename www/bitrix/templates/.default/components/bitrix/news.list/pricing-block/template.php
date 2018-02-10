<?php
    if (is_null($arResult['EARLY_REGISTRATION'])) {
        include_once (__DIR__ . '/blocks/simple.php');
    } else {
        include_once (__DIR__ . '/blocks/early_registration.php');  
    }
?>