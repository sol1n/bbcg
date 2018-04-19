<?
  if (! function_exists('user')) {
    function user($id = null){
      if ($id == null){
        global $USER;
        if (! $id = $USER->GetID())
          return null;
      }

      $rsUsers = CUser::GetList(($by="id"), ($order="desc"), ["ID" => $id], ['FIELDS' => ['ID', 'NAME', 'LAST_NAME', 'SECOND_NAME', 'LOGIN', 'EMAIL', 'PERSONAL_PHONE', 'PERSONAL_STREET', 'PERSONAL_BIRTHDAY', 'PERSONAL_STATE', 'PERSONAL_CITY', 'PERSONAL_GENDER', 'PERSONAL_PHOTO', 'WORK_POSITION', 'WORK_COMPANY', 'WORK_PROFILE'], 'SELECT' => []]);
      if($user = $rsUsers->Fetch()){
        if (strlen($user['NAME']) > 0){
          $user['DISPLAY_NAME'] = trim($user['LAST_NAME'] . ' ' . $user['NAME']);
        }
        else
          $user['DISPLAY_NAME'] = $user['LOGIN'];

        return $user;
      }
      else
        return null;
    }
  }

  if (! function_exists('sendEmail')) {
    function sendEmail($to, $theme, $template, $data = [], $cc = [], $bcc = []){

    include_once('Mail.php');

    $headers = [];
    $headers['To']          = $to;
    $headers['From']        = "B2B Conference Group <" . SMTP_USER . ">";
    $headers['Subject']     = $theme;

    if (count($cc)){
      $cc = implode(', ', $cc);
      $headers['Cc'] = $cc;
    }
    if (count($bcc)){
      $bcc = implode(', ', $bcc);
      $realto = $to . ', ' . $bcc;
    }
    else
    {
      $realto = $to;
    }

    $headers['MIME-Version']        = '1.0';
    $headers['Content-type']        = 'text/html; charset=utf-8';

    $content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/templates/' . $template . '.html');
    foreach($data as $key => $value){
      $content = str_replace('#' . mb_strtoupper($key) . '#', htmlspecialchars($value), $content);
    }

    $content = str_replace('#IP#', $_SERVER['REMOTE_ADDR'], $content);
    $content = str_replace('#UA#', $_SERVER['HTTP_USER_AGENT'], $content);
    $content = str_replace('#IP_COUNTRY#', $_SERVER['GEOIP_COUNTRY_NAME'], $content);
    $content = str_replace('#IP_CITY#', $_SERVER['GEOIP_CITY'], $content);

    $params = [];
    $params['host'] = SMTP_HOST;
    $params['port'] = 25;
    if (SMTP_AUTH == true) {
      $params['username'] = SMTP_USER;
      $params['password'] = SMTP_PASSWORD;
      $params['auth'] = true;
    }

    $mail_object =& Mail::factory('smtp', $params);
    return $mail_object->send($realto, $headers, $content);
  }

  if (!function_exists('localizeUrl')) {
    function localizeUrl($url, $lang) {
      switch ($lang) {
        case 'ru':
          return strpos($url, '/en') === 0 
            ? mb_substr($url, 3)
            : $url;
        case 'en':
          return strpos($url, '/en') !== 0
            ? "/en$url"
            : $url;
      }
    }
  }
}
?>