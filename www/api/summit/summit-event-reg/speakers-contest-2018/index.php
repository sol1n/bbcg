<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-type:application/json;charset=utf-8');

if ($_REQUEST['lang'] == 'en')
{
    $messages = [
        'summit' => "Event is inactive. Please contact the site administration",
        'error' => "Request sending error. Please contact the site administration",
        'success' => 'Request successfully sended',
        'empty' => 'You did not fill out the required fields',
        'select' => 'Select a speaker from the list'
    ];
}
else
{
    $messages = [
        'summit' => "Запись на событие невозможна. Пожалуйста, свяжитесь с администрацией сайта",
        'error' => "Ошибка отправки запроса. Пожалуйста, свяжитесь с администрацией сайта",
        'success' => "Заявка успешно отправлена",
        'empty' => 'Вы не заполнили обязательные поля'.' '.$_POST['id'].' '.$_POST['fullname'].' '.$_POST['word_description'].' '.$_POST['speaker'],
        'select' => 'Выберите спикера из списка'
    ];
}

if ($_POST['id'] && $_POST['fullname'] && $_POST['phone'] && $_POST['email'] && $_POST['company'] && $_POST['position'] && $_POST['word'] && $_POST['speaker'] && $_POST['g-token'])
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($curl, CURLOPT_FAILONERROR, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query([
        'secret' => RECAPTCHA_SECRET,
        'response' => $_POST['g-token'],
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ]));
    $result = curl_exec($curl);
    curl_close($curl);

    $parsed = json_decode($result);
    if (!isset($parsed->success) || !$parsed->success) {
        {
            echo json_encode([
                'success' => false,
                'message' => $messages['error'],
            ]);
        }
    } else {

        CModule::IncludeModule('iblock');

        $arSelect = Array("ID", "IBLOCK_ID", "NAME","PROPERTY_*");
        $arFilter = Array("IBLOCK_ID"=>SPEAKERS_IBLOCK, "ACTIVE"=>"Y", "NAME"=>$_REQUEST['speaker']);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
        if($ob = $res->GetNextElement()){
            $arFields = $ob->GetFields();
            $arProps = $ob->GetProperties();

            $arFilter = Array('IBLOCK_ID'=>SUMMIT_EVENTS_REQEST_IBLOCK, 'ACTIVE'=>'Y', 'ID'=>$_POST['id']);
            $arSelect = array("UF_*");
            $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true, $arSelect);
            if($ar_event_result = $db_list->GetNext()){
                $ar_section = $ar_event_result;
            }
            $el = new CIblockElement;
            $result = $el->Add([
                'IBLOCK_ID' => SUMMIT_EVENTS_REQEST_IBLOCK,
                'IBLOCK_SECTION_ID' => $_POST['id'],
                'NAME' => 'Заявка на участие',
                'PROPERTY_VALUES' => [
                    'FULLNAME' => $_REQUEST['fullname'],
                    'EMAIL' => $_REQUEST['email'],
                    'PHONE' => $_REQUEST['phone'],
                    'COMPANY' => $_REQUEST['company'],
                    'POSITION' => $_REQUEST['position'],
                    'SPEAKER' => $arFields['ID'],
                    'WORD' => $_REQUEST['word'],
                    'WORD_DESCRIPTION' => array("TEXT"=>$_REQUEST['word_description'], "TYPE"=>"html")
                ]
            ]);

            $curr_votes = $arProps['VOTES']['VALUE'];
            if(empty($curr_votes)){
                $curr_votes = 0;
            }
            $new_votes = $curr_votes + 1;

            CIBlockElement::SetPropertyValuesEx($arFields['ID'], false, array("VOTES" => $new_votes));

            echo json_encode([
                'success' => true,
                'message' => $messages['success'],
                'requestId' => $result
            ]);

            if (function_exists('fastcgi_finish_request')) {
                fastcgi_finish_request();
            }

            $data = [
                'EVENT'    => $ar_section['NAME'],
                'FULLNAME' => $_REQUEST['fullname'],
                'EMAIL' => $_REQUEST['email'],
                'PHONE' => $_REQUEST['phone'],
                'COMPANY' => $_REQUEST['company'],
                'POSITION' => $_REQUEST['position'],
                'SPEAKER' => 'ID #'.$arFields['ID']." ".$_REQUEST['speaker'],
                'WORD' => $_REQUEST['word'],
                'WORD_DESCRIPTION' => $_REQUEST['word_description'],
            ];
            $result = sendEmail($ar_section['UF_EMAIL'], 'Заявка на сайте', 'speakers-contest-2018/administration', $data, [], ['dr.nightingale@mail.ru']);
        } else {
            echo json_encode([
                'success' => false,
                'message' => $messages['select'],
            ]);
        }
    }
}
else
{
    echo json_encode([
        'success' => false,
        'message' => $messages['empty'],
    ]);
}
?>
