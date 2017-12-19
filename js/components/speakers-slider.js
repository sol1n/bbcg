(function() {
    var $slider = $(".js-speakers-slider");

    $slider.slick({
        infinite: true,
        slidesToShow: 4,
        rows: 2,
        slidesToScroll: 4,
        appendArrows: ".speakers-block-header-arrows",
        prevArrow: '<button type="button" class="slick-arrow slick-arrow-white slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-arrow slick-arrow-white slick-next"></button>',
        responsive: [
            {
                breakpoint: 1080,
                settings: {
                    rows: 1,
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 769,
                settings: {
                    rows: 1,
                    dots: true,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 520,
                settings: {
                    rows: 1,
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