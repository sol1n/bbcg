<nav class="subnav">
    <div class="wrapper">
        <ul class="subnav-list subnav-list-wide">
            <? foreach ($arResult['SECTIONS'] as $k => $section): ?>
                <? if ((!isset($arParams['opened']) && $k == 0) || $section['CODE'] == $arParams['opened']): ?>
                    <li class="subnav-list-item active">
                        <a href="<?=$section['SECTION_PAGE_URL']?>" class="subnav-link active">
                            <span><?=$section['NAME']?></span>
                        </a>
                    </li>
                <? else: ?>
                    <li class="subnav-list-item">
                        <a href="<?=$section['SECTION_PAGE_URL']?>" class="subnav-link">
                            <span><?=$section['NAME']?></span>
                        </a>
                    </li>
                <? endif ?>
            <? endforeach ?>
        </ul>
    </div>
</nav>