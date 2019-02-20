<?
use \Bitrix\Main\Localization\Loc;

$lang = "";
if($arParams['LANG'] == 'en'){
    $lang = "/en";
}
?>

<div class="main-heading main-heading-black">
    <div class="wrapper partners-heading-wrapper">
        <h1 class="main-heading-title">Партнеры</h1>
        <a
            id="partners-form"
            href="#"
            data-side-modal
            data-side-modal-url="<?=$lang?>/include/partners/partners-modal-registration.php"
            data-side-modal-class="registration-modal contestform-modal"
            data-side-modal-prevent-overlay-close
            data-side-modal-prevent-esc-close
            class="button button-red partners-button partners-button-left"
        >
            <?=Loc::GetMessage('BECOME_A_PARTNER', [], $arParams['LANG'])?>
        </a>
    </div>
</div>

<div class="wrapper m-t-md m-b-md">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9 m-b-md">
            <? foreach ($arResult['SECTIONS'] as $section): ?>
                <? if ($section['ELEMENT_CNT']): ?>
                    <h2 class="text-center"><?=$section['NAME']?></h2>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:news.list",
                        "partners-row",
                        Array(
                            "ADD_SECTIONS_CHAIN" => "N",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "N",
                            "CACHE_TIME" => "3600",
                            "CACHE_TYPE" => "A",
                            "DISPLAY_BOTTOM_PAGER" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "FIELD_CODE" => array(),
                            "IBLOCK_ID" => PARTNERS_IBLOCK,
                            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                            "NEWS_COUNT" => "15",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => "main",
                            "PARENT_SECTION" => $section['ID'],
                            "PARENT_SECTION_CODE" => "",
                            "PROPERTY_CODE" => array("*"),
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "N",
                            "SORT_BY1" => "SORT",
                            "SORT_ORDER1" => "ASC",
                            "SORT_BY2" => "ID",
                            "SORT_ORDER2" => "DESC",
                        )
                    );?>
                <? endif ?>
            <? endforeach ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 m-b-md">
                <?
                global $contactsFilter;
                $contactsFilter = ['PROPERTY_SHOW_PARTNERSPAGE_VALUE' => 'Y'];
                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "partners-contacts-block",
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
        </div>
    </div>

</div>
