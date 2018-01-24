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