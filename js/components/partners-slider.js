(function() {
    var $slider = $(".js-partners-slider");
    $slider.slick({
        infinite: true,
        slidesToShow: 4,
        rows: 2,
        slidesToScroll: 4,
        appendArrows: ".partners-block-header-arrows",
        responsive: [
            {
                breakpoint: 1080,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 769,
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
                    slidesToShow: 2,
                    slidesToScroll: 2
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