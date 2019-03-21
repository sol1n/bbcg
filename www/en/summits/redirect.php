<?
// массив названий саммитов
$arr_summits = array(
    'academy-customer-experience-officer',
    'shop-forever',
    'akademiya-riteyla',
    'online-retail-russia',
    'food-business-russia',
    'digital-technologies-forum',
    'retail-business-russia',
    'fashion-retail-russia',
    'commercial-director-forum',
    'diy-household-retail-russia',
);

//если год саммита не указан в url перенаправлять на страницу текущего года
$link = explode('/', $_SERVER['REQUEST_URI'], 4);
$new_link_start = $link[2];
$new_link_end = $link[3];

if(in_array($new_link_start, $arr_summits)){
    $new_link = "/en/".$new_link_start."-2019/".$new_link_end;
    LocalRedirect($new_link);
}
?>
