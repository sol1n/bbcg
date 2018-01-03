<? if ($arResult['ITEMS']): ?>
    <li class="parent">
        <a href="/<?$APPLICATION->ShowProperty('code')?>/about/">О саммите</a>

        <div class="main-header-submenu">
            <div class="wrapper">
                <ul>
                    <? foreach ($arResult['ITEMS'] as $page): ?>
                        <li>
                            <a href="/<?$APPLICATION->ShowProperty('code')?>/about/<?=$page["CODE"]?>/"><?=$page['NAME']?></a>
                        </li>
                    <? endforeach ?>
                </ul>
            </div>
        </div>
    </li>
<? else: ?>
    <li>
        <a href="/<?$APPLICATION->ShowProperty('code')?>/about/">О саммите</a>
    </li>
<? endif ?>