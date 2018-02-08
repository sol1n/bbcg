<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-type:application/json;charset=utf-8');

if ($USER->IsAuthorized()) {
    if ($_REQUEST['lang'] == 'en') {
        $messages = [
            'redirect' => '/en/personal/',
            'empty' => 'You did not fill out the required fields'
        ];
    } else {
        $messages = [
            'redirect' => '/personal/',
            'empty' => 'Вы не заполнили обязательные поля'
        ];
    }

    if ($_POST['first_name'] && $_POST['last_name'] && $_POST['email'] && $_POST['phone'])
    {

        $id = $USER->GetID();
        $u = new CUser;

        if ($_POST['sex'] == 'male')
        {
            $gender = 'M';
        }
        if ($_POST['sex'] == 'female')
        {
            $gender = 'F';
        }

        $fields = [
            'NAME' => $_POST['first_name'],
            'LAST_NAME' => $_POST['last_name'],
            'SECOND_NAME' => $_POST['middle_name'],
            'PERSONAL_PHONE' => $_POST['phone'],
            'EMAIL' => $_POST['email'],
            'PERSONAL_GENDER' => $gender,
            'PERSONAL_STATE' => $_POST['region'],
            'PERSONAL_CITY' => $_POST['city'],
            'WORK_PROFILE' => $_POST['scope'],
            'WORK_COMPANY' => $_POST['organisation'],
            'WORK_POSITION' => $_POST['title'],
        ];

        if ($_FILES['photo'] && $_FILES['photo']['error'] == 0)
        {
            $fields['PERSONAL_PHOTO'] = $_FILES['photo'];
        }

        if ($_POST['birthdate'])
        {
            $now = new DateTime($_POST['birthdate']);
            $fields['PERSONAL_BIRTHDAY'] = $now->format("d.m.Y H:i:s");
        }

        $u->Update($id, $fields);

        echo json_encode([
            'success' => true,
            'redirect' => $messages['redirect']
        ]);
    }
    else
    {
        echo json_encode([
            'success' => false,
            'message' => $messages['empty']
        ]);
    }
} else {
    CHTTP::SetStatus(403);
}
?>