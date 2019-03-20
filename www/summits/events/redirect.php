<?
//если год саммита не указан в url перенаправлять на страницу текущего года

$link = explode('/', $_SERVER['REQUEST_URI'], 3);
$new_link_start = $link[1];
$new_link_end = $link[2];

$haystack = $new_link_start;
$needle = '20';
$pos = strripos($haystack, $needle);

if ($pos === false) {
    $new_link = "/".$new_link_start."-2019/".$new_link_end;
    LocalRedirect($new_link);
}
?>
