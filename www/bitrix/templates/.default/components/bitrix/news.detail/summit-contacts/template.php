<?
    use \Bitrix\Main\Localization\Loc;
?>
<div class="main-heading main-heading-<?=$arResult['COLOR']?> program-table-main-heading">
    <div class="wrapper">
        <h1 class="main-heading-title"><?=Loc::GetMessage('CONTACTS', [], $arParams['LANG'])?></h1>
    </div>
</div>

<? if ($arResult['PROPERTIES']['CONTACTS']['VALUE']): ?>
    <?=$arResult['PROPERTIES']['CONTACTS']['~VALUE']['TEXT']?>
<? else: ?>
    <div class="wrapper">
        <div class="contacts-block m-t-xl m-b-xl">
                <div class="row m-b-lg">
                    <div class="col-xs-12 col-sm-4">
                        <div class="contacts-block-item">
                            <div class="contacts-block-item-icon">
                                <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-contacts-place.svg'); ?>
                            </div>
                            <div class="contacts-block-item-content">
                                <div class="contacts-block-item-title">
                                    <?=Loc::GetMessage('PHYSICAL_ADDRESS', [], $arParams['LANG'])?>
                                </div>
                                <div class="contacts-block-item-value">
                                    <?=Loc::GetMessage('ADDRESS', [], $arParams['LANG'])?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="contacts-block-item">
                            <div class="contacts-block-item-icon">
                                <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-contacts-phone.svg'); ?>
                            </div>
                            <div class="contacts-block-item-content">
                                <div class="contacts-block-item-title">
                                    <?=Loc::GetMessage('CONTACT_INFORMATION', [], $arParams['LANG'])?>
                                </div>
                                <div class="contacts-block-item-value">
                                    <?=Loc::GetMessage('CONTACT_PHONE', [], $arParams['LANG'])?>: <a href="tel:+74957852206">(495) 785-22-06</a>, <a href="tel:+74957811134">(495) 781-11-34</a> <br>
                                    email: <a href="mailto:info@b2bcg.ru">info@b2bcg.ru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="contacts-block-item">
                            <div class="contacts-block-item-icon">
                                <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-contacts-manager.svg'); ?>
                            </div>
                            <div class="contacts-block-item-content">
                                <div class="contacts-block-item-title">
                                    <?=Loc::GetMessage('COOPERATION', [], $arParams['LANG'])?>
                                </div>
                                <div class="contacts-block-item-value">
                                    <span class="contacts-block-item-value-title">email:</span> <a href="mailto:info@b2bcg.ru">info@b2bcg.ru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <?
    global $contactsFilter;
    $contactsFilter = ['PROPERTY_SUMMIT' => $arResult['ID']];
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "contacts-block",
        Array(
            "FILTER_NAME" => "contactsFilter",
            "ADD_SECTIONS_CHAIN" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "N",
            "CACHE_TIME" => "3600",
            "CACHE_TYPE" => "A",
            "DISPLAY_BOTTOM_PAGER" => "N",
            "DISPLAY_TOP_PAGER" => "N",
            "FIELD_CODE" => array(),
            "IBLOCK_ID" => CONTACTS_IBLOCK,
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "NEWS_COUNT" => "15",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "main",
            "PARENT_SECTION" => "",
            "PARENT_SECTION_CODE" => "",
            "PROPERTY_CODE" => array("*"),
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SORT_BY1" => "SORT",
            "SORT_ORDER1" => "ASC",
            "NAME" => "BBCG",
            "ANDROID_APP_LINK" => $arResult['PROPERTIES']['ANDROID_APP_LINK']['VALUE'],
            "IOS_APP_LINK" => $arResult['PROPERTIES']['IOS_APP_LINK']['VALUE'],
            "LANG" => $arParams['LANG'],
        )
    );?>

    <?
        $lang = "";
        if($arParams['LANG'] == 'en'){
            $lang = "/en";
        }
    ?>
    <? $APPLICATION->IncludeFile($lang.'/include/blocks/contacts-map.php'); ?>

    <div class="feedback-block">
        <div class="wrapper">
            <form action="/api/feedback/" method="POST" class="feedback-block-form" data-validate data-form-ajax>
                <input name="summit" value="<?=$arResult['ID']?>" type="hidden" >
                <input name="from" value="<?=$arResult['NAME']?>" type="hidden" >
                <div class="feedback-block-title">
                    <?=Loc::GetMessage('FEEDBACK', [], $arParams['LANG'])?>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="feedback-form-name" class="form-label"><?=Loc::GetMessage('NAME_AND_SURNAME', [], $arParams['LANG'])?> *</label>
                            <? if (isset($arParams['USER']['NAME']) || isset($arParams['USER']['LAST_NAME'])): ?>
                                <? $username = trim($arParams['USER']['LAST_NAME'] . ' ' . $arParams['USER']['NAME']); ?>
                                <input id="feedback-form-name" type="text" class="form-input" name="name" value="<?=$username?>" required placeholder="Иван Иванов">
                            <? else: ?>
                                <input id="feedback-form-name" type="text" class="form-input" name="name" required placeholder="<?=Loc::GetMessage('NAME_AND_SURNAME_PLACEHOLDER', [], $arParams['LANG'])?>">
                            <? endif ?>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="feedback-form-email" class="form-label">E-mail *</label>
                            <? if (isset($arParams['USER']['EMAIL'])): ?>
                                <input id="feedback-form-email" type="email" class="form-input" name="email" value="<?=$arParams['USER']['EMAIL']?>" required placeholder="ivanov@mail.ru">
                            <? else: ?>
                                <input id="feedback-form-email" type="email" class="form-input" name="email" required placeholder="ivanov@mail.ru">
                            <? endif ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="feedback-form-message" class="form-label"><?=Loc::GetMessage('YOUR_MESSAGE', [], $arParams['LANG'])?> *</label>
                    <textarea id="feedback-form-message" class="form-textarea" name="message" cols="30" rows="10" placeholder="<?=Loc::GetMessage('YOUR_MESSAGE_PLACEHOLDER', [], $arParams['LANG'])?>" required></textarea>
                </div>

                <div data-recaptcha="<?=RECAPTCHA_PUBLIC?>"></div>

                <div class="feedback-block-submit">
                    <button type="submit" class="button button-<?=$arResult['PROPERTIES']['COLOR']['VALUE']?>">
                        <?=Loc::GetMessage('SEND', [], $arParams['LANG'])?>
                    </button>
                </div>
            </form>
        </div>
    </div>
<? endif ?>
