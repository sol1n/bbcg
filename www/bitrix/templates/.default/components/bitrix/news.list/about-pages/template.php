<? if ($arResult['ITEMS']): ?>
    <li class="parent">
        <? if ($arParams['LANG'] == 'en'): ?>
            <?
                $about_link = '/en/'.$arParams['SUMMIT_CODE'].'/about/';
                if ($arParams['offcanvas'] == 'Y')
                    $about_link = '#';
            ?>
            <a href="<?=$about_link ?>">About</a>
        <? else: ?>
            <?
                $about_link = '/'.$arParams['SUMMIT_CODE'].'/about/';
                if ($arParams['offcanvas'] == 'Y')
                    $about_link = '#';
            ?>
            <a href="<?=$about_link ?>">О мероприятии</a>
        <? endif ?>

        <div class="main-header-submenu">
            <div class="wrapper">
                <ul>
                    <? foreach ($arResult['ITEMS'] as $page): ?>
                        <li>
                            <? if ($arParams['LANG'] == 'en'): ?>
                                <a href="/en/<?=$arParams['SUMMIT_CODE']?>/about/<?=$page["CODE"]?>/"><?=$page['NAME']?></a>
                            <? else: ?>
                                <a href="/<?=$arParams['SUMMIT_CODE']?>/about/<?=$page["CODE"]?>/"><?=$page['NAME']?></a>
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
            <a href="/en/<?=$arParams['SUMMIT_CODE']?>/about/">About</a>
        <? else: ?>
            <a href="/<?=$arParams['SUMMIT_CODE']?>/about/">О мероприятии</a>
        <? endif ?>
    </li>
<? endif ?>
