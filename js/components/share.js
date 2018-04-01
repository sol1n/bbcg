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
      var img = $('.side-modal-overflow').find('img');
      var imgUrl = '';
      var detail_page_url = $('.news-item-share').data('url');
      var page_url = document.location.protocol+'//'+document.location.hostname+detail_page_url;
      var title = $('.side-modal-news-title').text().trim();
      var description = $('.side-modal-news-hidden').text().trim();

      if ( detail_page_url == undefined || detail_page_url == false){
        page_url = document.location.href;
        img = $('body').find('img');
        title = $('head > title').text();
        description = $('[name="description"]').attr('content');
      }

      for (var i = 0; i < img.length; i++) {
        if (!imgUrl && img[i].naturalHeight > 100 && img[i].naturalWidth > 100) {
          imgUrl = img[i].currentSrc;
        }
      }

      return {
        url: page_url,
        title: title,
        description: description,
        img: imgUrl
      };
    }

    function popup(url) {
      window.open(url, '', 'toolbar=0,status=0,width=626,height=436');
    }
  };
  share();
})
