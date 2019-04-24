<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

//DIYHRR2019_AWARD_EVENT_ID -- section ID summit events request

CModule::IncludeModule("iblock");
$arFilter = Array('IBLOCK_ID'=>SUMMIT_EVENTS_REQEST_IBLOCK, 'ACTIVE'=>'Y', 'ID'=>DIYHRR2019_AWARD_EVENT_ID);
$arSelect = array("UF_*");
$db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true, $arSelect);
if($ar_event_result = $db_list->GetNext()):
    $btnClass = $ar_event_result['UF_BTN_CLASS'] != "" ? $ar_event_result['UF_BTN_CLASS'] : "button-red";
?>
    <? if(!empty($ar_event_result['PICTURE'])): ?>
        <div class="registration-modal-logo">
            <? $img = CFile::ResizeImageGet($ar_event_result['PICTURE'], ['width' => 357*2, 'height' => 238*2], BX_RESIZE_IMAGE_PROPORTIONAL); ?>
            <img src="<?=$img['src']?>" alt="<?=$ar_event_result['NAME']?>" style="width: 100%;">
        </div>
    <? endif ?>
    <div class="registration-modal-title m-b-none">
        <?=$ar_event_result['DESCRIPTION']?>
    </div>

    <form action="/api/summit/summit-event-reg/diy-hrr-awards-2019/" method="POST" class="summit-registration-block-form" data-validate data-form-ajax style="padding: 10px 30px 0 30px;">
        <input type="hidden" name="from" value="<?=$ar_event_result["CODE"]?>">
        <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>
        <input type="text" name="id" class="hidden" value="<?=DIYHRR2019_AWARD_EVENT_ID?>">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        Выберите номинацию
                    </label>
                    <div class="form-select">
                        <select name="nomination">
                            <option value="best_federal">Лучшая федеральная сеть России по продажам товаров для ремонта и дома</option>
                            <option value="best_regional">Лучшая региональная сеть России по продажам товаров для ремонта и дома</option>
                            <option value="year_supplier">Поставщик года</option>
                            <option value="year_person">Персона года</option>
                            <option value="bright_idea">Яркая идея</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        Название компании
                    </label>
                    <input type="text" name="company" class="form-input" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        Контактная информация (e-mail, телефон):
                    </label>
                    <input type="text" name="contacts" class="form-input" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        Объясните, почему ваша компания заслуживает этой награды
                    </label>
                    <textarea name="why_deserves" class="form-input" required></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="submit-registration-block-form-hint">
                    Нажимая кнопку «Зарегистрироваться», я принимаю условия <a href="/eula/" target="_blank">Пользовательского соглашения</a> и даю согласие на обработку персональных данных.
                </div>
            </div>
        </div>
        <div class="registration-form-submit">
            <button type="submit" class="button <?=$btnClass?>">
                Подать заявку
            </button>
        </div>
    </form>
<?endif;?>
