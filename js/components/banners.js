$(".banner-close").click(function() {
    $(this).closest('.banner').fadeOut('slow');
    $('.horizontal-banner').addClass('closed');
});

$(window).resize(function() {
    if ($(window).width() < 1024) {
        $('.horizontal-banner').hide();
    } else {
        if(!$('.horizontal-banner').hasClass('closed')){
            $('.horizontal-banner').fadeIn('slow');
        }
    }
});
