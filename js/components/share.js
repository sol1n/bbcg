$(function(){
  var share = function () {
    $('[data-share="vk"]').on('click', handlerShareVk);
    $('[data-share="fb"]').on('click', handlerShareFacebook);
    $('[data-share="tw"]').on('click', handlerShareTwitter);

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
      var img = $('body').find('img'),
          imgUrl = '';

      for (var i = 0; i < img.length; i++) {
        if (!imgUrl && img[i].naturalHeight > 100 && img[i].naturalWidth > 100) {
          imgUrl = img[i].currentSrc;
        }
      }

      return {
        url: document.location.href,
        title: $('head > title').text(),
        description: $('[name="description"]').attr('content'),
        img: imgUrl
      };
    }

    function popup(url) {
      window.open(url, '', 'toolbar=0,status=0,width=626,height=436');
    }
  };
  share();
})