(function() {
    var $header = $('.main-header'),
        $headerGlobal = $('.header-global'),
        $headerGlobalHeight = $headerGlobal.height();

    function fixHeader() {
        var scrollTop = $(window).scrollTop();
        if (scrollTop < $headerGlobalHeight) {
            $header.css('top', $headerGlobalHeight - scrollTop);
        } else {
            $header.css('top', 0);
        }
    }

    if ($headerGlobal.length) {
        fixHeader();

        $(window).on('scroll', function () {
            fixHeader();
        });
    }
})();