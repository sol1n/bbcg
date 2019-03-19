<?
    use \Bitrix\Main\Localization\Loc;
?>
<div class="main-heading main-heading-<?=$arResult['COLOR']?>">
    <div class="wrapper">
        <h1 class="main-heading-title">
            <?=Loc::GetMessage('PARTNERS', [], $arParams['LANG'])?>
        </h1>
    </div>
</div>

<div class="wrapper m-t-md m-b-md">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-9 m-b-md">
            <? foreach ($arResult['SECTIONS'] as $section): ?>
                <h2 class="text-center"><?=$section['NAME']?></h2>
                <div class="row">
                    <? foreach ($section['ITEMS'] as $item): ?>
                        <div class="col-xs-12 col-sm-6 col-md-4 m-b-md">
                            <? if ($item['PROPERTY_LINK_VALUE']): ?>
                                <a target="_blank" href="<?=$item['PROPERTY_LINK_VALUE']?>" class="partners-block-card">
                                    <img src="<?=$item['PREVIEW_PICTURE']?>" alt="<?=$item['NAME']?>">
                                </a>
                            <? else: ?>
                                <a class="partners-block-card ">
                                    <img src="<?=$item['PREVIEW_PICTURE']?>" alt="<?=$item['NAME']?>">
                                </a>
                            <? endif ?>
                        </div>
                    <? endforeach ?>
                </div>
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
                        "COLOR" => $arResult['COLOR'],
                    )
                );?>
        </div>
    </div>
</div>
