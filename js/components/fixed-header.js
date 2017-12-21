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

    if ($headerGlobal.length && $headerGlobal.is(":visible")) {
        fixHeader();

        $(window).on('scroll resize', function () {
            fixHeader();
        });
    }
})();