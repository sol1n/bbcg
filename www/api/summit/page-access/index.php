<?
define('STOP_STATISTICS', true);
define('SESSION_TRY', 2);//x=5 попыток на сессию
define('IP_TRY', 0);//x=20 поппыток на IP
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

header('Content-type:application/json;charset=utf-8');

function getRealIP() {
  $ip = false;
  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
     $ips = explode (', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
     for ($i = 0; $i < count($ips); $i++) {
        if (!preg_match("/^(10|172\\.16|192\\.168)\\./", $ips[$i])) {
           $ip = $ips[$i];
           break;
        }
     }
  }
  return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

if ($_REQUEST['lang'] == 'en')
{
    $messages = [
        'error' => "Request sending error. Please contact the site administration",
        'success' => 'Correct code',
        'failure' => 'Incorrect access code',
        'empty' => 'You did not fill out the required fields',
        'denied' => 'Access denied'
    ];
}
else
{
    $messages = [
        'error' => "Ошибка отправки запроса. Пожалуйста, свяжитесь с администрацией сайта",
        'success' => "Код подтвержден",
        'failure' => 'Неверный код доступа',
        'empty' => 'Вы не заполнили обязательные поля',
        'denied' => 'Доступ запрещен'
    ];
}

if ($_POST['code'] && $_POST['page'] && $_POST['g-token'])
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
        /* инициализация кэша */
        $user_ip = getRealIP();
        $cacheTime = 3600;
        $cacheId = 'History_page_' . $_POST['page'] . '_' . $user_ip;
        $cachePath = '/';
        $obCache = new CPHPCache();

        if ($obCache->InitCache($cacheTime, $cacheId, $cachePath)) {
            $arResult = $obCache->GetVars();
            $cache_try = $arResult['TRY'];
            $obCache->Clean($cacheId, $cachePath);
        } else {
            $cache_try = 0;
        }

        session_start();
        if (!isset($_SESSION['history-page'][$_POST['page']]['try'])){

            $_SESSION['history-page'][$_POST['page']]['try'] = 0;
        }

        if (($_SESSION['history-page'][$_POST['page']]['try'] > SESSION_TRY-1) && ($cache_try > IP_TRY)){
            echo json_encode([
                'success' => false,
                'message' => $messages['denied'],
                'denied' => true
            ]);
        } else {
            CModule::IncludeModule('iblock');
            $res = CIBlockElement::GetList(
            	['ID' => 'ASC'],
            	['IBLOCK_ID' => PAGES_IBLOCK, 'ACTIVE' => 'Y', 'ID' => $_POST['page']],
            	false,
            	false,
            	['ID', 'NAME', 'PROPERTY_ACCESS_CODE']
            );
            if ($page = $res->Fetch()) {
                $db_code = $page['PROPERTY_ACCESS_CODE_VALUE'];
                $obCache->StartDataCache();
                if ($db_code == $_POST['code']) {
                    $_SESSION['history-page'][$_POST['page']]['access'] = 'Y';
                    $_SESSION['history-page'][$_POST['page']]['try'] = 0;
                    $obCache->EndDataCache(array("TRY" => 0, "ACCESS" => 'Y'));
                    echo json_encode([
                        'success' => true,
                        'message' => $messages['success'],
                        'reload' => true,
                        'try' => $_SESSION['history-page'][$_POST['page']]['try'].'/'.SESSION_TRY,
                        'try_ip' => $cache_try.'/'.IP_TRY,
                        'cacheId' => $cacheId,
                    ]);
                } else{
                    $_SESSION['history-page'][$_POST['page']]['access'] = 'N';
                    $_SESSION['history-page'][$_POST['page']]['try']++;
                    $cache_try++;
                    $obCache->EndDataCache(array("TRY" => $cache_try, "ACCESS" => 'N'));
                    echo json_encode([
                        'success' => false,
                        'message' => $messages['failure'],
                        'try' => $_SESSION['history-page'][$_POST['page']]['try'].'/'.SESSION_TRY,
                        'try_ip' => $cache_try.'/'.IP_TRY,
                        'cacheId' => $cacheId,
                    ]);
                }
            } else{
                echo json_encode([
                    'success' => false,
                    'message' => $messages['error']
                ]);
            }
        }

    }
}
else
{
    echo json_encode([
        'success' => false,
        'message' => $messages['empty']
    ]);
}
?>
