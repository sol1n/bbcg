<?
//если год саммита не указан в url перенаправлять на страницу текущего года

$link = explode('/', $_SERVER['REQUEST_URI'], 3);
$new_link_start = $link[1];
$new_link_end = $link[2];

$file_path = explode('/', $_SERVER['REAL_FILE_PATH'], 3);

$haystack = $new_link_start;
$needle = '20';
$pos = strripos($haystack, $needle);

if (($pos === false) && ($new_link_start != '') && ($file_path[1] == 'summits') && ($new_link_start != 'login')
 && ($new_link_start != 'academy') && ($new_link_start != 'registration')  && ($new_link_start != 'retail')
  && ($new_link_start != 'about') && ($new_link_start != 'eula')) {
    $new_link = "/".$new_link_start."-2019/".$new_link_end;
    LocalRedirect($new_link);
}
?>
