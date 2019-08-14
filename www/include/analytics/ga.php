<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-41882092-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-41882092-1');
  gtag('config', 'AW-719048509');
</script>

<script>
  gtag('config', 'AW-719048509/IKMoCOa9t6cBEL2e79YC', {
    'phone_conversion_number': '+7 (495) 785-22-06'
  });
  gtag('config', 'AW-719048509/_nXcCLTBt6cBEL2e79YC', {
    'phone_conversion_number': '+7 (495) 781-11-34'
  });
</script>

<!-- Event snippet for Звонок с мобильного сайта conversion page
In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
<script>
function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  };
  gtag('event', 'conversion', {
      'send_to': 'AW-719048509/e0kuCJmwvKcBEL2e79YC',
      'event_callback': callback
  });
  return false;
}
</script>


<!-- Google Analytics from old site -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-15579667-1']);
  _gaq.push(['_setDomainName', 'none']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_addOrganic', 'images.google.ru', 'q', true]);
  _gaq.push(['_addOrganic', 'images.yandex.ru', 'text', true]);
  _gaq.push(['_addOrganic', 'blogs.yandex.ru', 'text', true]);
  _gaq.push(['_addOrganic', 'blogsearch.google.ru', 'q', true]);
  _gaq.push(['_addOrganic', 'go.mail.ru', 'q']);
  _gaq.push(['_addOrganic', 'win.mail.ru', 'q']);
  _gaq.push(['_addOrganic', 'gogo.ru', 'q']);
  _gaq.push(['_addOrganic', 'nova.rambler.ru', 'query']);
  _gaq.push(['_addOrganic', 'nigma.ru', 's']);
  _gaq.push(['_addOrganic', 'google.com.ua', 'q']);
  _gaq.push(['_addOrganic', 'affiliates.quintura.com', 'request']);
  _gaq.push(['_addOrganic', 'search.qip.ru', 'query']);
  _gaq.push(['_addOrganic', 'ru.yahoo.com', 'p']);
  _gaq.push(['_addOrganic', 'market.yandex.ru', 'test', true]);
  _gaq.push(['_addOrganic', 'video.yandex.ru', 'text']);
  _gaq.push(['_addOrganic', 'price.ru', 'pnam']);
  _gaq.push(['_addOrganic', 'torg.mail.ru', 'q']);
  _gaq.push(['_addOrganic', 'maps.google.ru', 'q']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
