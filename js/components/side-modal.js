function initSideModalWrapper(classNames) {
    var $modalWrapper = $(
        '<div class="side-modal-overlay">' +
            '<div class="side-modal ' + classNames + '">' +
                '<a href="#" class="side-modal-close" data-side-modal-close></a>' +
                '<div class="side-modal-overflow">' +
                '</div>' +
            '</div>' +
        '</div>'
    );

    var $overlay = $('body').children('.side-modal-overlay');

    if ($overlay.length) {
        $overlay.remove();
    }

    $('body').append($modalWrapper);

    return $('body').children('.side-modal-overlay');
}

function initSideModal(content, classNames, preventOverlayClose, preventEscClose) {
    var $wrapper = initSideModalWrapper(classNames);
    $wrapper.find('.side-modal-overflow').html(content);
    $wrapper.find('[data-masked-input]').maskedinput();
    $wrapper.find('[data-validate]').formValidation();
    $wrapper.find('[data-form-ajax]').formAjax();

    setTimeout(function () {
        $wrapper.addClass('active');
        // Focus on first input in modal
        $wrapper.find('input').first().focus();
        if (!preventOverlayClose) {
            $(document).on('click', 'body', hide);
        }

        if (!preventEscClose) {
            $(document).on('keyup', hide);
        }
    }, 200);

    var hide = function(e) {
        if (
            ( !$(e.target).closest('.side-modal').length && !$(e.target).is('input, label') && !$(e.target).is('body') ) ||
            ( e.which === 27 )
        ) {
            $wrapper.removeClass('active');
            $(document).off('click', 'body', hide);

            if (!preventEscClose) {
                $(document).off('keyup', hide);
            }
        }
    };

    $wrapper.find('[data-side-modal-close]').click(function () {
        if (!preventOverlayClose) {
            $(document).off('click', 'body', hide);
        }

        if (!preventEscClose) {
            $(document).off('keyup', hide);
        }

        $wrapper.removeClass('active');
        return false;
    });
}

$(document).on('click', '[data-side-modal]', function (e) {
    var url = $(this).attr('href'),
        altUrl = $(this).data('side-modal-url'),
        modalContentSelector = $(this).data('side-modal'),
        classNames = $(this).data('side-modal-class'),
        preventMobile = $(this).is('[data-side-modal-prevent-mobile]'),
        preventOverlayClose = $(this).is('[data-side-modal-prevent-overlay-close]'),
        preventEscClose = $(this).is('[data-side-modal-prevent-esc-close]');

    if (preventMobile) {
        if (window.outerWidth < 768) {
            window.location.href = url;
            return;
        }
    }

    if (modalContentSelector) {
        $modalContent = $(modalContentSelector).clone();
        initSideModal($modalContent, classNames, preventOverlayClose, preventEscClose);
    } else {
        $('body').spin('large', '#000');

        $.ajax({
            url: altUrl || url,
            method: 'GET',
            cache: false
        }).done(function (data) {
            $modalContent = data;
            initSideModal($modalContent, classNames, preventOverlayClose, preventEscClose);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            alert('Ошибка загрузки данных. Пожалуйста, попробуйте перезагрузить страницу. Error while loading data. Please, try to reload page.');
            console.log(jqXHR);
            console.log(errorThrown);
        }).always(function () {
            $('body').spin(false);
        });
    }

    return false;
});