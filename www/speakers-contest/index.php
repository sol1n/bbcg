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
                Примите участие в конкурсе <b>Вездеход 2019</b> и выиграйте бесплатный именной пропуск на все мероприятия BBCG и Академии Ритейла. 
            </p>
            <p>Это <b>7 профильных конференций</b> и <b>15 образовательных программ</b> в сфере розничной торговли, встречи только с первыми лицами ритейла и производственных компаний на одной площадке.*</p>
            <p class="speakers-contest-text">
                Победитель станет известен совсем скоро на Рождественском ужине BBCG и Академии Ритейла. Разыграем главный приз уходящего года <b>20 декабря 2018</b> года в прямом эфире в нашей группе на Facebook. 
            </p><p>Успейте сейчас или будете жалеть весь год!
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
                        <input type="text" name="fullname" class="form-input" value="<?=$arParams['USER']['LAST_NAME']?> <?=$arParams['USER']['NAME']?> <?=$arParams['USER']['SECOND_NAME']?>" required>
                        <? else: ?>
                        <input type="text" name="fullname" class="form-input" required>
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
                        <input type="text" name="position" class="form-input" value="<?=$arParams['USER']['WORK_POSITION']?>" required>
                        <? else: ?>
                        <input type="text" name="position" class="form-input" required>
                        <? endif ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="m-t-md">
                        <div class="submit-registration-block-form-hint">
                            Заполняя форму, я принимаю условия <a href="/eula/" target="_blank">Пользовательского соглашения</a> и даю согласие на обработку персональных данных.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="speakers-block speakers-block-downarrow">
            <div class="wrapper">
                <h4 class="m-b-n speakers-contest-step">Шаг 1</h4>
                <h2>КТО ЛУЧШИЙ СПИКЕР 2018?</h2>
                <p class="speakers-contest-text">
                    Каждый год мы приглашаем на наши мероприятия топ-спикеров поделиться успешными кейсами, лучшими практиками и решениями, которые меняют современный ритейл.
                </p>
                <p class="speakers-contest-text">
                    Кто станет лучшим спикером 2018 года, решаете только вы.
                </p>
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
                        "CACHE_TYPE" => "N",
                        "CACHE_TIME" => "300",
                        "CACHE_FILTER" => "Y",
                        "CACHE_GROUPS" => "N",
                    ), false);
                ?>
            </div>
        </section>

        <section class="sessions-block">
            <div class="wrapper">
                <h4 class="m-b-n speakers-contest-step">Шаг 2</h4>
                <h2>КАКОЕ ГЛАВНОЕ СЛОВО 2018 ГОДА В РИТЕЙЛЕ?</h2>
                <p class="speakers-contest-text">
                    Недавно составители словаря Collins выбрали словом года <b>single-use</b> — «одноразовый». Это термин, используемый для обозначения предметов, которые наносят вред окружающей среде и негативно влияют на пищевую цепь. В прошлом году словом года назвали <b>fake news</b> — фейковые новости, в 2016-м — <b>Brexit</b>.
                </p>

                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="m-b">
                            <label class="form-label">
                                Какое слово стало главным в нашей сфере в 2018 году? 
                            </label>
                            <input type="text" name="word" class="form-input" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="m-b">
                            <label class="form-label">
                                Почему? (необязательное поле)
                            </label>
                            <textarea name="word_description" class="form-input" rows="5"></textarea>
                        </div>
                    </div>
                
                </div>
                <div class="submit-registration-block-form-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 speakers-contest-form-submit-container">
                            <button type="submit" class="button <?=$btnClass?>">
                                Хочу победить
                            </button>
                        </div>
                
                        <div class="col-xs-12 col-sm-12">
                            <div class="submit-registration-block-form-hint">
                                <p>
                                    *Нажимая кнопку «Хочу победить», я принимаю условия <a href="/eula/" target="_blank">Пользовательского соглашения</a> и даю согласие на обработку персональных данных.
                                </p>
                                <p>
                                    **Пропуск конкурса «Вездеход2019» является именным и не может передаваться третьим лицам. Действителен для всех мероприятий BBCG и Академии Ритейла до 31.12.2019 в статусе «Делегат». Денежный эквивалент пропуска не выдается.
                                </p>
                            </div>
                        </div>
                     </div>
                </div>
        </section>
    </form>
</div>

<?endif;?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
