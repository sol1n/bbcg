(function() {
    $('.js-smooth-scroll').click(function() {
        history.pushState(null, null, $(this).attr('href'));
        var elementId = window.location.hash;
        var headerHeight = $('.main-header').height() + 20;
        if ($(elementId).length > 0) {
            $('html, body').animate({
                scrollTop: $( $.attr(this, 'href') ).offset().top - headerHeight
            }, 700);
        } else {
            //console.log('no element!');
        }
        return false;
    });
})();