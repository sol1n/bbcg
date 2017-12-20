(function() {
    var $slider = $(".js-sessions-slider");

    $slider.slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        appendArrows: ".sessions-block-header-arrows",
        responsive: [
            {
                breakpoint: 900,
                settings: {
                    arrows: false,
                    dots: true,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 520,
                settings: {
                    arrows: false,
                    dots: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    function resize() {
        if ($(window).width() < 520) {
            $slider.slick('slickFilter', function(i) {
                return i < 10;
            });
        }
    }

    resize();
})();