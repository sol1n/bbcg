$(document).ready(function() {
    $(".js-slick-slider").slick();
    $('[data-masked-input]').maskedinput();
    $('[data-form-ajax]').formAjax();
    $('[data-validate]').formValidation();
    $('[data-suggest-search]').suggestSearch();

    $('.main-offcanvas-menu .parent').on('click', function () {
        $(this).children('.main-header-submenu').slideToggle();
        $(this).children('a').toggleClass('rotate');
    });

    if($('.horizontal-banner').length){
        if ($(window).width() > 1024){// не показывать горизонтальный баннер на мобильных устройствах
            $('.horizontal-banner').delay(10000).fadeIn('slow');
        }
    }

    if ($('.partners-contacts').length){// страница партнеров
        if ($(window).width() > 1023){// фиксировать блок контактов на декстопных устройствах

            (function(){
            var a = document.querySelector('#sticky_item'), b = null, P = 68;  // если ноль заменить на число, то блок будет прилипать до того, как верхний край окна браузера дойдёт до верхнего края элемента. Может быть отрицательным числом
            window.addEventListener('scroll', Ascroll, false);
            document.body.addEventListener('scroll', Ascroll, false);
            function Ascroll() {
              if (b == null) {
                var Sa = getComputedStyle(a, ''), s = '';
                for (var i = 0; i < Sa.length; i++) {
                  if (Sa[i].indexOf('overflow') == 0 || Sa[i].indexOf('padding') == 0 || Sa[i].indexOf('border') == 0 || Sa[i].indexOf('outline') == 0 || Sa[i].indexOf('box-shadow') == 0 || Sa[i].indexOf('background') == 0) {
                    s += Sa[i] + ': ' +Sa.getPropertyValue(Sa[i]) + '; '
                  }
                }
                b = document.createElement('div');
                b.style.cssText = s + ' box-sizing: border-box; width: ' + a.offsetWidth + 'px;';
                a.insertBefore(b, a.firstChild);
                var l = a.childNodes.length;
                for (var i = 1; i < l; i++) {
                  b.appendChild(a.childNodes[1]);
                }
                a.style.height = b.getBoundingClientRect().height + 50 +'px';
                a.style.padding = '0';
                a.style.border = '0';
              }
              var Ra = a.getBoundingClientRect(),
                  R = Math.round(Ra.top + b.getBoundingClientRect().height - 50 - document.querySelector('.main-footer').getBoundingClientRect().top - 30);  // селектор блока, при достижении верхнего края которого нужно открепить прилипающий элемент;  Math.round() только для IE; если ноль заменить на число, то блок будет прилипать до того, как нижний край элемента дойдёт до футера
              if ((Ra.top - P) <= 0) {
                if ((Ra.top - P) <= R) {
                  b.className = 'stop';
                  b.style.top = - R +'px';
                } else {
                  b.className = 'sticky';
                  b.style.top = P + 'px';
                }
              } else {
                b.className = '';
                b.style.top = '';
              }
              window.addEventListener('resize', function() {
                a.children[0].style.width = getComputedStyle(a, '').width
              }, false);
            }
            })()

        }
    }



});

var gCapthaInit = function() {

}
