(function() {
    var $slider = $(".js-summits-slider");

    $slider.on('init', function (e, slick) {
        setTimeout(function () {
            // Let's go to last possible slide 💩
            slick.slickGoTo(999, false);
        });
    });

    $slider.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
        var $nextSlide = $(slick.$slides[nextSlide]).find('[data-summits-year]');

        var year = $nextSlide.data('summits-year');

        if (year) {
            $('.js-summits-slider-current-year').html(year);
        }
    });

    $slider.slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        appendArrows: ".summits-block-header-arrows"
    });
})();