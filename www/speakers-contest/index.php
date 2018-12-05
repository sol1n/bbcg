<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
define('STOP_STATISTICS', true);
define('SPEAKERS_CONTEST_2018_EVENT_ID', 20);

//SPEAKERS_CONTEST_2018_EVENT_ID -- section ID summit events request

CModule::IncludeModule("iblock");
$arFilter = Array('IBLOCK_ID'=>SUMMIT_EVENTS_REQEST_IBLOCK, 'ACTIVE'=>'Y', 'ID'=>SPEAKERS_CONTEST_2018_EVENT_ID);
$arSelect = array("UF_*");
$db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true, $arSelect);
if($ar_event_result = $db_list->GetNext()):
    $btnClass = $ar_event_result['UF_BTN_CLASS'] != "" ? $ar_event_result['UF_BTN_CLASS'] : "button-red";
?>
    <div class="wrapper">
        <form action="/api/" method="POST" class="summit-registration-block-form" data-validate data-form-ajax style="max-width: 1140px;" >
            <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>
            <input name="summit" value="<?=$arResult['ID']?>" type="hidden">
            <h1>Голосование за лучшего спикера 2018</h1>
            <p style="font-size: 18px;">
            Мечтали выиграть 1 000 000 рублей? Потратьте его на образование!
            Примите участие в конкурсе Вездеход 2019 и выиграйте бесплатный именной пропуск на все мероприятия BBCG и Академии Ритейла. Это 7 профильных конференций и 15 образовательных программ в сфере розничной торговли, встречи только с первыми лицами ритейла и производственных компаний на одной площадке*.
            Победитель станет известен совсем скоро на Рождественском ужине BBCG и Академии Ритейла. Разыграем главный приз уходящего года 20 декабря 2018 года в прямом эфире в нашей группе на Facebook. Успейте сейчас или будете жалеть весь год!
            </p>
            <div class="summit-registration-block-form-title">
                Давайте познакомимся с вами
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="m-b">
                        <label class="form-label">
                            ФИО
                        </label>
                        <? if ((isset($arParams['USER']['LAST_NAME']))&&(isset($arParams['USER']['NAME']))): ?>
                            <input type="text" name="full_name" class="form-input" value="<?=$arParams['USER']['LAST_NAME']?> <?=$arParams['USER']['NAME']?> <?=$arParams['USER']['SECOND_NAME']?>" required>
                        <? else: ?>
                            <input type="text" name="full_name" class="form-input" required>
                        <? endif ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="m-b">
                        <label class="form-label">
                            Мобильный телефон
                        </label>
                        <? if (isset($arParams['USER']['PERSONAL_PHONE'])): ?>
                            <input type="text" name="phone" class="form-input" placeholder="+7 (999) 999-99-99" value="<?=$arParams['USER']['PERSONAL_PHONE']?>" required>
                        <? else: ?>
                            <input type="text" name="phone" class="form-input" placeholder="+7 (999) 999-99-99" required>
                        <? endif ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="m-b">
                        <label class="form-label">
                            E-mail
                        </label>
                        <? if (isset($arParams['USER']['EMAIL'])): ?>
                            <input type="email" name="email" class="form-input" value="<?=$arParams['USER']['EMAIL']?>" required>
                        <? else: ?>
                            <input type="email" name="email" class="form-input" required>
                        <? endif ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="m-b">
                        <label class="form-label">
                            Компания
                        </label>
                        <? if (isset($arParams['USER']['WORK_COMPANY'])): ?>
                            <input type="text" name="company" class="form-input" value="<?=$arParams['USER']['WORK_COMPANY']?>" required>
                        <? else: ?>
                            <input type="text" name="company" class="form-input" required>
                        <? endif ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="m-b">
                        <label class="form-label">
                            Должность
                        </label>
                        <? if (isset($arParams['USER']['WORK_POSITION'])): ?>
                            <input type="text" name="title" class="form-input" value="<?=$arParams['USER']['WORK_POSITION']?>" required>
                        <? else: ?>
                            <input type="text" name="title" class="form-input" required>
                        <? endif ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="m-t-md">
                        <div class="submit-registration-block-form-hint">
                            Нажимая кнопку «Зарегистрироваться», я принимаю условия <a href=\"/eula/\" target=\"_blank\">Пользовательского соглашения</a> и даю согласие на обработку персональных данных.
                        </div>
                    </div>
                </div>
                <input type="hidden" id="summit_name" value="<?=$arResult['NAME']?>"/>
            </div>

            <div class="m-b-xl">
                <h4 class="m-b-n" style="text-decoration: underline;">Шаг 1</h4>
                <h2>КТО ЛУЧШИЙ СПИКЕР 2018?</h2>
                <p style="font-size: 19px;">
                    Каждый год мы приглашаем на наши мероприятия топ-спикеров поделиться успешными кейсами, лучшими практиками и решениями, которые меняют современный ритейл.
                </p>
                <p style="font-size: 19px;">
                    Кто станет лучшим спикером 2018 года, решаете только вы.
                </p>
            </div>

            <?
                $APPLICATION->IncludeComponent("bitrix:news.list", "speakers-contest-block", array(
                    "FILTER_NAME" => "",
                    "IBLOCK_ID" => SPEAKERS_IBLOCK,
                    "NEWS_COUNT" => "1000",
                    "SORT_BY1" => "PROPERTY_VOTES",
                    "SORT_ORDER1" => "DESC",
                    "SORT_BY2" => "PROPERTY_LASTNAME",
                    "SORT_ORDER2" => "ASC",
                    "FIELD_CODE" => array(""),
                    "PROPERTY_CODE" => array("*"),
                    "SET_TITLE" => "N",
                    "SET_STATUS_404" => "N",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "N",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_TEMPLATE" => "main",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "3600",
                    "CACHE_FILTER" => "Y",
                    "CACHE_GROUPS" => "N",
                ), false);
            ?>

            <div class="m-b-xl">
                <h4 class="m-b-n" style="text-decoration: underline;">Шаг 2</h4>
                <h2>КАКОЕ ГЛАВНОЕ СЛОВО 2018 ГОДА В РИТЕЙЛЕ?</h2>
                <p style="font-size: 19px;">
                    Недавно составители словаря Collins выбрали словом года <b>single-use</b> — «одноразовый». Это термин, используемый для обозначения предметов, которые наносят вред окружающей среде и негативно влияют на пищевую цепь. В прошлом году словом года назвали fake news — фейковые новости, в 2016-м — Brexit.
                </p>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="m-b">
                        <label class="form-label">
                            Какое слово стало для вас главным в нашей сфере в 2018 году?
                        </label>
                        <input type="text" name="word" class="form-input" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="m-b">
                        <label class="form-label">
                            Почему?
                        </label>
                        <textarea  name="why_this_word" class="form-input" rows="5"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                <div class="submit-registration-block-form-hint">
                    <p>
                        *Нажимая кнопку «Хочу победить», я принимаю условия <a href=\"/eula/\" target=\"_blank\">Пользовательского соглашения</a> и даю согласие на обработку персональных данных.
                    </p>
                    <p>
                        *Пропуск конкурса «Вездеход2019» является именным и не может передаваться третьим лицам. Действителен для всех мероприятий BBCG и Академии Ритейла до 31.12.2019. <b>Денежный эквивалент пропуска не выдается</b>.
                    </p>
                </div>
            </div>

            <div class="submit-registration-block-form-footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-6">
                        <button type="submit" class="button <?=$btnClass?>">
                            Хочу победить
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?endif;?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
