<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-type:application/json;charset=utf-8');

define('MAX_SIZE', 15728640);//max file size (byte)

$messages = [
    'summit' => "Запись на событие невозможна. Пожалуйста, свяжитесь с администрацией сайта",
    'error' => "Ошибка отправки запроса. Пожалуйста, свяжитесь с администрацией сайта",
    'success' => "Заявка успешно отправлена",
    'empty' => 'Вы не заполнили обязательные поля',
    'wrong_size' => 'Файл слишком большой',
    'wrong_type' => 'Файл имеет неправильное расширение',
];

$from = [
    'miss-retail' => 'Мисс Ритейл 2018',
];
if ($_POST['fullname'] && $_POST['birthdate'] && $_POST['position'] && $_POST['education'] && $_POST['company'] && $_POST['contacts']
 && $_POST['profession_choice'] && $_POST['dreams'] && $_POST['work_for_you'] && $_POST['hobby'] && $_POST['g-token']) {
    if (($_FILES['file']['error'] == '1') || ($_FILES['file']['size'] > MAX_SIZE)){
        echo json_encode([
            'success' => false,
            'message' => $messages['wrong_size'],
        ]);
    } elseif (strripos($_FILES['file']['type'], 'image') === false) {
        echo json_encode([
            'success' => false,
            'message' => $messages['wrong_type'],
        ]);
    } else {
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
            $page = isset($_REQUEST['from']) && isset($from[$_REQUEST['from']]) ? $from[$_REQUEST['from']] : '';

            $f_name = $_FILES['file']['name'];
            $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/upload/missretail_tmp';
            $is_moved = move_uploaded_file($_FILES['file']['tmp_name'], "$uploads_dir/$f_name");
            if ($is_moved) {

                CModule::IncludeModule('iblock');

                $work_for_you = Array ("TEXT" => $_REQUEST['work_for_you'], "TYPE" => "text");
                $hobby = Array ("TEXT" => $_REQUEST['hobby'], "TYPE" => "text");
                $birthdate = $_REQUEST['birthdate'];
                $birthdate=@date('d.m.Y', strtotime($birthdate));

                $el = new CIblockElement;
                $result = $el->Add([
                    'IBLOCK_ID' => MISSRETAIL_REQUESTS_IBLOCK,
                    'NAME' => 'Заявка на участие в конкурсе Мисс Ритейл 2018',
                    'PREVIEW_PICTURE' => CFile::MakeFileArray($uploads_dir."/".$f_name),
                    'PREVIEW_TEXT' => $_REQUEST['profession_choice'],
                    'DETAIL_TEXT' => $_REQUEST['dreams'],
                    'PROPERTY_VALUES' => [
                        'FULLNAME' => $_REQUEST['fullname'],
                        'BIRTHDATE' => $birthdate,
                        'COMPANY' => $_REQUEST['company'],
                        'POSITION' => $_REQUEST['position'],
                        'EDUCATION' => $_REQUEST['education'],
                        'CONTACTS' => $_REQUEST['contacts'],
                        'WORK_FOR_YOU' => $work_for_you,
                        'HOBBY' => $hobby,
                    ]
                ]);

                echo json_encode([
                    'success' => true,
                    'message' => $messages['success'],
                    'requestId' => $result
                ]);

                if (function_exists('fastcgi_finish_request')) {
                    fastcgi_finish_request();
                }

                $arSelect = Array("IBLOCK_ID", "ID", "NAME", "PREVIEW_PICTURE");
                $arFilter = Array("IBLOCK_ID"=>MISSRETAIL_REQUESTS_IBLOCK, "ID"=>$result);
                $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
                if($ob = $res->GetNextElement())
                {
                   $arFields = $ob->GetFields();
                   $photo_link = "http://www.b2bcg.ru".CFile::GetPath($arFields["PREVIEW_PICTURE"]);
                }

                $data = [
                    'FULLNAME' => $_REQUEST['fullname'],
                    'BIRTHDATE' => $birthdate,
                    'COMPANY' => $_REQUEST['company'],
                    'POSITION' => $_REQUEST['position'],
                    'EDUCATION' => $_REQUEST['education'],
                    'CONTACTS' => $_REQUEST['contacts'],
                    'PROFESSION_CHOICE' => $_REQUEST['profession_choice'],
                    'DREAMS' => $_REQUEST['dreams'],
                    'WORK_FOR_YOU' => $_REQUEST['work_for_you'],
                    'HOBBY' => $_REQUEST['hobby'],
                    'PHOTO' => $photo_link
                ];
                $result = sendEmail(RBR2018AWARDS_EMAIL, 'Заявка на сайте', 'missretail2018/administration', $data, [], ['sol1n@mail.ru', 'dr.nightingale@mail.ru']);

                unlink ($uploads_dir."/".$f_name);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => $messages['error'],
                ]);
            }
        }
    }

} else {
    echo json_encode([
        'success' => false,
        'message' => $messages['empty'],
    ]);
}
?>
