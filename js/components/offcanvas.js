(function() {
    function hideEvent(e, closestEl, hideFunc) {
        if(!$(e.target).closest(closestEl).length) {
            hideFunc();
            $(document).off('click', 'body', hideEvent);
        }
    }

    var offcanvasOverlay = '#offcanvas',
        offcanvas = '#offcanvas > .main-offcanvas';

    function show() {
        $('.js-offcanvas').addClass('active');
        $(offcanvasOverlay).addClass('active');

        $(document).on('click', 'body', function (e) {
            hideEvent(e, offcanvas, hide);
        });
    }

    function hide() {
        $('.js-offcanvas, ' + offcanvasOverlay).removeClass('active');
    }

    $('.js-offcanvas').click(function () {
        if ($(this).hasClass('active')) {
            hide();
        } else {
            show();
        }

        return false;
    });

    /*if ( $(offcanvasOverlay).length ) {
        var offcanvasHammer = new Hammer($(offcanvasOverlay)[0]);
        offcanvasHammer.on("swipeleft", function(e) {
            hide();
        });
    }*/

    if (Swipe && document.getElementById("offcanvas")) {
        new Swipe(document.getElementById("offcanvas"), function(event, direction) {
            event.preventDefault();

            if (direction === 'left') {
                hide();
            }
        });
    }
})();