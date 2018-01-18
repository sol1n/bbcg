(function() {
    var $slider = $(".js-programs-slider");
    $slider.slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        rows: 2,
        arrows: true,
        dots: false,
        appendArrows: ".programs-block-header-arrows",
        responsive: [
            {
                breakpoint: 1170,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 767,
                settings: {
                    dots: true,
                    rows: 1,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 580,
                settings: {
                    dots: true,
                    rows: 1,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    function resize() {
        if ($(window).width() < 580) {
            $slider.slick('slickFilter', function(i) {
                return i < 10;
            });
        }
    }

    resize();
})();