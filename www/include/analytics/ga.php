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
<script>
// Get a reference to the form element, assuming
// it contains the ID attribute "signup-form".
var form = document.getElementById('summit-reg-form');

// Add a listener for the "submit" event.
form.addEventListener('submit', function(event) {

  // Prevent the browser from submitting the form
  // and thus unloading the current page.
  event.preventDefault();

  // Send the event to Google Analytics and
  // resubmit the form once the hit is done.
  gtag('event', 'spasibo', {
    'event_callback': function() {
      form.submit();
    }
  });
});

</script>
