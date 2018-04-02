(function() {
    var $slider = $(".js-gallery-slider");

    $slider.slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        appendArrows: ".js-gallery-slider-arrows",
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    arrows: false,
                    dots: true,
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    arrows: false,
                    dots: true,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });

    function resize() {
        if ($(window).width() < 600) {
            $slider.slick('slickFilter', function(i) {
                return i < 10;
            });
        }
    }

    resize();
})();