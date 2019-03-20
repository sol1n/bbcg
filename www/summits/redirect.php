<? //если год саммита не указан в url перенаправлять на страницу текущего года
/*
    $haystack = $_SERVER['DOCUMENT_URI'];
    $needle = '20';

    $pos = strripos($haystack, $needle);
    if ($pos === false) {
        $link = explode('/', $_SERVER['DOCUMENT_URI'], 3);
        $new_link_start = $link[1];
        $new_link_end = $link[2];
        LocalRedirect("/".$new_link_start."-2019/".$new_link_end);
    }
*/
?>
