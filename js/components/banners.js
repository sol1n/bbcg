$(".banner-close").click(function() {
    $('.horizontal-banner').addClass('closed');
    $(this).closest('.banner').fadeOut('slow');
    $.ajax({
        url: "/api/banners/close/",
        type: "POST",
        dataType: 'json'
    }).done(function (result_data) {
        console.log(result_data);
    });
});

$(window).resize(function() {
    if ($(window).width() < 1024) {
        $('.horizontal-banner').hide();
    } else {
        if(!$('.horizontal-banner').hasClass('closed')){
            $('.horizontal-banner').fadeIn('slow');
            setTimeout(function() {
                $('.horizontal-banner').fadeOut('slow');
            }, 3*60*1000); //hide banner after 3 min.
        }
    }
});
