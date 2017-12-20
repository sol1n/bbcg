(function() {
    var $header = $('.main-header'),
        $headerGlobal = $('.header-global'),
        $headerGlobalHeight = $headerGlobal.height();

    if ($headerGlobal.length) {
        $(window).on('scroll', function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop < $headerGlobalHeight) {
                $header.css('top', $headerGlobalHeight - scrollTop);
            } else {
                $header.css('top', 0);
            }
        });
    }
})();