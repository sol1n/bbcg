$(document).ready(function() {
    $(".js-slick-slider").slick();
    $('[data-masked-input]').maskedinput();
    $('[data-form-ajax]').formAjax();
    $('[data-validate]').formValidation();

    $('.js-smooth-scroll').click(function() {
        history.pushState(null, null, $(this).attr('href'));
        var elementId = window.location.hash;
        if ($(elementId).length > 0) {
            $('html, body').animate({
                scrollTop: $( $.attr(this, 'href') ).offset().top - 10
            }, 700);
        } else {
            //console.log('no element!');
        }
        return false;
    });


});

var gCapthaInit = function() {
    
}