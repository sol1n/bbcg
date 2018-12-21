<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
define('STOP_STATISTICS', true);

//SPEAKERS_CONTEST_2018_EVENT_ID -- section ID summit events request

CModule::IncludeModule("iblock");
$arFilter = Array('IBLOCK_ID'=>SUMMIT_EVENTS_REQEST_IBLOCK, 'ACTIVE'=>'Y', 'ID'=>SPEAKERS_CONTEST_2018_EVENT_ID);
$arSelect = array("UF_*");
$db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true, $arSelect);
if($ar_event_result = $db_list->GetNext()):
    $btnClass = $ar_event_result['UF_BTN_CLASS'] != "" ? $ar_event_result['UF_BTN_CLASS'] : "button-red";
?>

<section class="mainimage-speakers-contest"></section>


<div>
    <form action="/api/summit/summit-event-reg/speakers-contest-2018/" method="POST" class="summit-registration-block-form speakers-contest-form" data-validate data-form-ajax>
        <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>
        <input name="id" value="<?=$ar_event_result['ID']?>" type="hidden">
        <div class="wrapper speakers-contest-wrapper">
            <h1>Мечтали выиграть 1 000 000 рублей? Потратьте его на образование!</h1>
        
            <p class="speakers-contest-text">
           Мы рада поздравить <b>Наталью Фирсову</b>, директора по развитию и внедрению проектов, БКК "Коломенский", с победой в конкурсе Вездеход2019. Вездеход2019 - Это 8 профильных конференций и 10 образовательных программ в сфере розничной торговли, встречи только с первыми лицами ритейла и производственных компаний на одной площадке.</p>

<p class="speakers-contest-text"><a href="https://www.facebook.com/B2BCG/videos/276462309705717/?__xts__%5b0%5d=68.ARB6B4ZezfNsz_KTe-q_j2dH9bAA2kc0Bv_Bd-yuXfXEoD4IyXQRq7D_xBHuB-i94Y1cz-sx_hWTkAzXYUBuM_s3nojlSCldmHMhNKHGlh_14_PPzqxB9R8ufy956kiumiJSbw49pdVZRLxvaQlirVtAe1jXXXNV8Me56Wd11dVYnHQYZMjA44IviNNGVE8Q0yAR7SjfZt3IPPQT1zRKNPg0_7GECuDqHOU6oAk298Tk_bfTwrx4GCTHWRNjZLMrgAAjT7OwJJT3QeZFdiZNf22mIZtGgTnAeOtKGfxERKVNQgYSaFVabVs4nGHIOYVQN9axm-HgJlioTv4che9bCPoLoJwfgFNjTw4&__tn__=-R">Как это было ? Смотрите в прямом эфире на Facebook.</a></p>


    </form>
</div>

<?endif;?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
