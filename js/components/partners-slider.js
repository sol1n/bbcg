(function() {
    var $slider = $(".js-partners-slider");
    $slider.slick({
        infinite: true,
        //slidesToShow: 4,
        slidesPerRow: 4,
        rows: 2,
        slidesToScroll: 1,
        appendArrows: ".partners-block-header-arrows",
        responsive: [
            {
                breakpoint: 1080,
                settings: {
                    rows: 1,
                    slidesPerRow: 1,
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 769,
                settings: {
                    arrows: false,
                    dots: true,
                    rows: 1,
                    slidesPerRow: 1,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 520,
                settings: {
                    rows: 1,
                    dots: true,
                    slidesPerRow: 1,
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