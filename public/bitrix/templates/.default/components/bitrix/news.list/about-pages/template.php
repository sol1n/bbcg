<? if ($arResult['ITEMS']): ?>
    <li class="parent">
        <? if ($arParams['LANG'] == 'en'): ?>
            <a href="/en/<?$APPLICATION->ShowProperty('code')?>/about/">About</a>
        <? else: ?>
            <a href="/<?$APPLICATION->ShowProperty('code')?>/about/">О саммите</a>
        <? endif ?>

        <div class="main-header-submenu">
            <div class="wrapper">
                <ul>
                    <? foreach ($arResult['ITEMS'] as $page): ?>
                        <li>
                            <? if ($arParams['LANG'] == 'en'): ?>
                                <a href="/en/<?$APPLICATION->ShowProperty('code')?>/about/<?=$page["CODE"]?>/"><?=$page['NAME']?></a>
                            <? else: ?>
                                <a href="/<?$APPLICATION->ShowProperty('code')?>/about/<?=$page["CODE"]?>/"><?=$page['NAME']?></a>
                            <? endif ?>
                        </li>
                    <? endforeach ?>
                </ul>
            </div>
        </div>
    </li>
<? else: ?>
    <li>
        <? if ($arParams['LANG'] == 'en'): ?>
            <a href="/en/<?$APPLICATION->ShowProperty('code')?>/about/">About</a>
        <? else: ?>
            <a href="/<?$APPLICATION->ShowProperty('code')?>/about/">О саммите</a>
        <? endif ?>
    </li>
<? endif ?>