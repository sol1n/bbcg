<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

//SBERBANK_COMPETITION_EVENT_ID -- section ID summit events request

CModule::IncludeModule("iblock");
$arFilter = Array('IBLOCK_ID'=>SUMMIT_EVENTS_REQEST_IBLOCK, 'ACTIVE'=>'Y', 'ID'=>SBERBANK_COMPETITION_EVENT_ID);
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
    <div class="registration-modal-title ">
        <?=$ar_event_result['NAME']?>
    </div>
    <div class="registration-modal-subtitle">
        <?=$ar_event_result['DESCRIPTION']?>
    </div>

    <form action="/api/summit/summit-event-reg/shop-forever-competition-2019/" method="POST" class="summit-registration-block-form" data-validate data-form-ajax>
        <input type="hidden" name="from" value="<?=$ar_event_result["CODE"]?>">
        <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>
        <input type="text" name="id" class="hidden" value="<?=SBERBANK_COMPETITION_EVENT_ID?>">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        ФИО
                    </label>
                    <input type="text" name="fullname" class="form-input" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        Должность
                    </label>
                    <input type="text" name="position" class="form-input" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        Мобильный телефон
                    </label>
                    <input type="text" name="phone" class="form-input" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        E-mail
                    </label>
                    <input type="email" name="email" class="form-input" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="m-b">
                    <label class="form-label">
                        ФИО капитана
                    </label>
                    <input type="text" name="captain" class="form-input" required>
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
