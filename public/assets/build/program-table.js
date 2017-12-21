$(document).ready(function () {
    var tableCellWidth = $('[data-program-table-cell-width]').data('program-table-cell-width') || 260;

    // Horizontal scroller
    baron({
        scroller: '.js-program-table-scrollable',
        bar: '.js-program-table-scrollbar',
        scrollingCls: '_scrolling',
        draggingCls: '_dragging',
        direction: 'h',
        impact: 'scroller'
    }).controls({
        track: '.js-program-table-scroll-track'
        //forward: '.js-program-table-scroll-right',
        //backward: '.js-program-table-scroll-left'
    });

    $('.js-program-table-scroll-right, .js-program-table-scroll-left').click(function() {
        var currentScroll = $('.js-program-table-scrollable').scrollLeft(),
            currentShift = currentScroll%tableCellWidth,
            forwardShift = tableCellWidth-currentShift,
            direction = $(this).hasClass('js-program-table-scroll-left') ? -1 : 1,
            scrollAmount = 0;

        if (direction > 0) {
            scrollAmount = currentShift ? currentScroll + forwardShift : currentScroll + tableCellWidth;
        } else {
            scrollAmount = currentShift ? currentScroll - currentShift : currentScroll - tableCellWidth;
        }

        /*
        console.log('currentShift: ' + currentShift);
        console.log('dir: ' + direction);
        console.log('scrollAmount: ' + scrollAmount);
        */

        $('.js-program-table-scrollable').animate({
            'scrollLeft':  scrollAmount
        }, 200);
    });

    $('.program-table-timeline-date')
        .css('height', $('.program-table-heading').height())
        .css('margin-bottom', $('.program-table-scroll').height());

    function programTableMobileFixed() {
        // Fixed program nav on mobiles

        var $header = $('.main-header'),
            $heading = $('.main-heading'),
            $subnavMenu = $('.subnav-list-program-menu'),
            scrollTop = $(window).scrollTop();

        if (
            $(window).width() <= 560 &&
            scrollTop > $header.outerHeight()
        ) {
            $heading.css( 'top', scrollTop - $header.outerHeight() );
            $subnavMenu.css( 'top', scrollTop - $header.outerHeight() );
        } else {
            $heading.css( 'top', 0 );
            $subnavMenu.css( 'top', 0 );
        }
    }

    function programTableScroll() {
        var $tableHeading = $('.program-table-heading'),
            $scroller = $('.program-table-scroll'),
            $timelineDate = $('.program-table-timeline-date'),
            scrollTop = $(window).scrollTop(),
            tableTopPosition = $('.js-program-table-scroll').position().top;

        if (scrollTop > tableTopPosition) {
            var topPos = scrollTop - tableTopPosition;
            $scroller.addClass('with-shadow');
            $tableHeading.css('top', topPos);
            $scroller.css('margin-top', topPos);
            $timelineDate.css('top', topPos);
        } else {
            $scroller.removeClass('with-shadow');
            $tableHeading.css('top', 0);
            $scroller.css('margin-top', 0);
            $timelineDate.css('top', 0);
        }

        programTableMobileFixed();
    }

    function programTableResize() {
        // Global events width
        var eventsViewPortWidth = 0;

        $('.program-table-heading-cell').each(function () {
            eventsViewPortWidth += $(this).outerWidth();
        });

        $('.program-table-event-global').css('width', eventsViewPortWidth);

        programTableMobileFixed();
    }

    programTableScroll();
    programTableResize();

    $(window).scroll(programTableScroll);
    $(window).resize(programTableResize);

    $('[data-program-table-fav]').click(function (e) {
        e.preventDefault();
        e.stopPropagation();

        var $link = $(this),
            active = $link.hasClass('active'),
            url = $link.data('program-table-fav') + "?activate=" + !active;

        $('body').spin('large', '#000');

        $.ajax({
            url: url,
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json'
        }).done(function (data) {
            if (data) {
                active ? $link.removeClass('active') : $link.addClass('active');
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            alert('Ошибка отправки данных. Пожалуйста, попробуйте ещё раз.');
            console.log(jqXHR);
            console.log(errorThrown);
        }).always(function () {
            $('body').spin(false);
        });

    })
});

