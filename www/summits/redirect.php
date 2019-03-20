<? //если год саммита не указан в url перенаправлять на страницу текущего года

global $USER;
if ($USER->IsAdmin()){
    $user_ID = $USER->GetID();
    if($user_ID=='182'){
        echo '<pre>';
        print_r($_SERVER);
        echo '</pre>';
        $haystack = $_SERVER['DOCUMENT_URI'];
        $needle = '20';
        $pos = strripos($haystack, $needle);

        if ($pos === false) {
            $link = explode('/', $_SERVER['DOCUMENT_URI'], 3);
            $new_link_start = $link[1];
            $new_link_end = $link[2];
            $new_link = "/".$new_link_start."-2019/".$new_link_end;
            echo '<pre>';
            print_r($new_link);
            echo '</pre>';
            //LocalRedirect($new_link);
        }

    }
}

?>
