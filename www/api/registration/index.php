<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-type:application/json;charset=utf-8');

if (! function_exists('generateRandomString')) {
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if ($_REQUEST['lang'] == 'en')
{
    $messages = [
        'theme' => 'B2B Conference Group site registration',
        'success' => "<div class='message-modal-title'>Thank you</div><p class='text-center'>Accounting data on the site sent, please check your email account</p>",
        'error' => "You did not fill out the required fields",
        'exists' => "This email already exist",
        'template' => "user/register-to-user-en"
    ];
}
else
{
    $messages = [
        'theme' => 'Регистрация на сайте «B2B Conference Group»',
        'success' => "<div class='message-modal-title'>Благодарим вас</div><p class='text-center'>Доступ на сайт отправлен в e-mail, пожалуйста проверьте свой электронный ящик</p>",
        'error' => "Вы не заполнили обязательные поля",
        'exists' => "Участник с таким email уже зарегистрирован",
        'template' => "user/register-to-user"
    ];
}

if ($_POST['first_name'] && $_POST['last_name'] && $_POST['email'] && $_POST['phone'] && $_POST['g-token'])
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
                'message' => $messages['error']
            ]);
        }
    } else {
        $exists =  CUser::GetList(($by="ID"), ($order="desc"), ['ACTIVE' => 'Y', 'EMAIL' => $_POST['email']])->Fetch();
        if ($exists){
            echo json_encode([
                'success' => false,
                'message' => $messages['exists']
            ]);
        }
        else
        {
            $password = generateRandomString(6);
            $arAuthResult = $USER->Register(
                $_POST['email'], 
                $_POST['first_name'], 
                $_POST['last_name'], 
                $password, 
                $password, 
                $_POST['email']
              );

            if ($arAuthResult['TYPE'] == 'ERROR')
            {
                echo json_encode([
                    'success' => false,
                    'message' => $arAuthResult['MESSAGE']
                ]);
            }
            else
            {
                $id = $USER->GetID();
                $USER->Logout();
                $u = new CUser;

                $fields = [
                    'SECOND_NAME' => $_POST['middle_name'],
                    'PERSONAL_PHONE' => $_POST['phone'],
                    'WORK_COMPANY' => $_POST['organisation'],
                    'WORK_POSITION' => $_POST['title'],
                    'UF_SUBSCRIBE' => (isset($_POST['mailing']) && $_POST['mailing'] == 'on') ? 1 : 0,
                    'WORK_PROFILE' => $_POST['work'],
                    'WORK_DEPARTMENT' => $_POST['type'],

                ];

                $u->Update($id, $fields);

                echo json_encode([
                    'success' => true,
                    'message' => $messages['success']
                ]);

                if (function_exists('fastcgi_finish_request')) {
                    fastcgi_finish_request();
                }

                $data = [
                    'name' => $_POST['first_name'],
                    'email' => $_POST['email'],
                    'password' => $password,
                    'firstname' => $_POST['first_name'],
                    'lastname' => $_POST['last_name'],
                    'phone' => $_POST['phone'],
                    'company' => $_POST['organisation'] ?? '',
                    'position' => $_POST['title'] ?? '',
                    'work' => $_POST['work'] ?? '',
                    'type' => $_POST['type'] ?? '',
                ];
                sendEmail($_POST['email'], $messages['theme'], $messages['template'], $data);
                sendEmail(ADMINISTRATION_EMAIL, 'Регистрация пользователя', 'user/register-to-admin', $data);
            }   
        }
    }
}
else
{
    echo json_encode([
        'success' => false,
        'message' => $messages['error']
    ]);
}

?>