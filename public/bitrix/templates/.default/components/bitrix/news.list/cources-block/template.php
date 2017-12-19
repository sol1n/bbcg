<section class="programs-block programs-block-downarrow">
    <div class="wrapper">
        <div class="programs-block-title">
            Программы обучения
        </div>
        <div class="programs-block-subtitle">
            Академия Ритейла предлагает уникальные учебные курсы
        </div>

        <div class="programs-block-cards">
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <div class="programs-block-cards-item">
                    <a href="<?=$item['DETAIL_PAGE_URL']?>" class="programs-block-card">
                        <div class="programs-block-card-header">
                            <div class="programs-block-card-title">
                                <?=$item['NAME']?>
                            </div>
                            <div class="programs-block-card-date">
                                <div class="programs-block-card-date-day">
                                    <?=$item['DAYS']?>
                                </div>
                                <div class="programs-block-card-date-month">
                                    <?=$item['MONTH']?>
                                </div>
                            </div>
                        </div>
                        <div class="programs-block-card-desc">
                            <?=$item['~PREVIEW_TEXT']?>
                        </div>
                    </a>    
                </div>
            <? endforeach ?>
        </div>
    </div>
</section>