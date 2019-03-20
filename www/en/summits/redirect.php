<?
//если год саммита не указан в url перенаправлять на страницу текущего года

$link = explode('/', $_SERVER['REQUEST_URI'], 4);
$new_link_start = $link[2];
$new_link_end = $link[3];

$file_path = explode('/', $_SERVER['REAL_FILE_PATH'], 4);

$haystack = $new_link_start;
$needle = '20';
$pos = strripos($haystack, $needle);

if (($pos === false) && ($new_link_start != '') && ($file_path[2] == 'summits') && ($new_link_start != 'login') && ($new_link_start != 'academy')) {
    $new_link = "/en/".$new_link_start."-2019/".$new_link_end;
    LocalRedirect($new_link);
}
?>
