$(document).ready(function() {
    $(".js-slick-slider").slick();
    $('[data-masked-input]').maskedinput();
    $('[data-form-ajax]').formAjax();
    $('[data-validate]').formValidation();
    $('[data-suggest-search]').suggestSearch();

/*
    if ($(window).width() > 1024){// не показывать горизонтальный баннер на мобильных устройствах
        $('.horizontal-banner').delay(10000).fadeIn('slow');
    }
*/

});

var gCapthaInit = function() {

}
