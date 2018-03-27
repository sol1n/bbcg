<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112810670-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112810670-1', {
    'custom_map': {'dimension1': 'bbcg-user-id'}
  });
</script>
<? if ($USER->IsAuthorized()): ?>
    <script>
        gtag('set', {'user_id': <? echo $USER->GetID() ?>}); 
        gtag('event', 'user_id_dimension', {'bbcg-user-id': <? echo $USER->GetID() ?>});
    </script>
<? elseif (isset($_GET['user_id'])): ?>
    <script>
        gtag('set', {'user_id': <? echo htmlspecialchars($_GET['user_id']) ?>});
        gtag('event', 'user_id_dimension', {'bbcg-user-id': <? echo htmlspecialchars($_GET['user_id']) ?>});
    </script>
<? endif ?>

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