$(function(){
  var share = function () {
    $(document).on('click', '[data-share="vk"]', handlerShareVk);
    $(document).on('click', '[data-share="fb"]', handlerShareFacebook);
    $(document).on('click', '[data-share="tw"]', handlerShareTwitter);

    function handlerShareVk(e) {
      e.preventDefault();
      var data = getData();
      var url = 'http://vkontakte.ru/share.php?';
      url += 'url=' + data.url;
      url += '&title=' + data.title;
      url += '&description=' + data.description;
      url += '&image=' + data.img;
      url += '&noparse=true';
      popup(url);
    }

    function handlerShareFacebook(e) {
      e.preventDefault();
      var data = getData();
      var url = 'https://www.facebook.com/sharer.php?';
      url += '&t=' + data.title;
      url += '&s=' + data.description;
      url += '&u=' + data.url;
      url += '&i=' + data.img;
      popup(url);
    }

    function handlerShareTwitter(e) {
      e.preventDefault();
      var data = getData();
      var url = 'http://twitter.com/share?';
      url += 'text=' + data.title;
      url += '&url=' + data.url;
      url += '&counturl=' + data.url;
      popup(url);
    }

    function getData() {
      var img = $('.side-modal-overflow').find('img');//выбираем все элементы <img> внутри модалки
      var imgUrl = '';//инициализация переменной для url изображения
      var detail_page_url = $('.news-item-share').data('url');//получаем значения аттрибута data у блока с кнопками шаринга
      var page_url = document.location.protocol+'//'+document.location.hostname+detail_page_url;//формируем адрес новостной страницы
      var title = $('.side-modal-news-title').text().trim();//получаем заголовок модалки
      var description = $('.side-modal-news-hidden').text().trim();//получаем анонс модалки

      if ( detail_page_url == undefined || detail_page_url == false){//если аттрибута data-url у блока с кнопками шаринга нет или он равен false(значит это не модалка)
        page_url = document.location.href;//меняем значение на адрес текущей страницы
        img = $('body').find('img');//получаем все элементы <img> внутри модалки
        title = $('head > title').text();//получаем значение title из секции head
        description = $('[name="description"]').attr('content');//получаем значение аттрибута content у метатега description
      }

      for (var i = 0; i < img.length; i++) {//цикл по всем элементам img
        if (!imgUrl && img[i].naturalHeight > 100 && img[i].naturalWidth > 100) {//выбираем первый img с оригинальной высотой и шириной больше 100px
          imgUrl = img[i].currentSrc;//получаем его url
        }
      }

      return {//возвращаем значения
        url: page_url,//адрес страницы с новостью которой делимся
        title: title,//заголовок
        description: description,//описание
        img: imgUrl//url изображения
      };
    }

    function popup(url) {
      window.open(url, '', 'toolbar=0,status=0,width=626,height=436');
    }
  };
  share();
})
