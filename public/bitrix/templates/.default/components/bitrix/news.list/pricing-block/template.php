<? if ($arResult['ITEMS']): ?>
    <section class="summit-price-block">
        <div class="wrapper">
            <div class="summit-price-block-title">
                Стоимость участия
            </div>

            <div class="summit-price-block-row">
                <div class="summit-price-block-left">
                    <div style="overflow-x: auto">
                        <table class="summit-price-block-table">
                            <tr class="summit-price-block-table-heading">
                                <th>
                                    <div class="summit-price-block-table-title">
                                        Вид регистрации
                                    </div>
                                </th>
                                <td>
                                    <div class="summit-price-block-table-title">
                                        Раняя регистрация
                                    </div>
                                    <? if ($arResult['EARLY_REGISTRATION']): ?>
                                        <div class="summit-price-block-table-subtitle">
                                            до <?=$arResult['EARLY_REGISTRATION']?>
                                        </div>
                                    <? endif ?>
                                </td>
                                <td>
                                    <div class="summit-price-block-table-title">
                                        Поздняя регистрация
                                    </div>
                                    <? if ($arResult['EARLY_REGISTRATION']): ?>
                                        <div class="summit-price-block-table-subtitle">
                                            после <?=$arResult['EARLY_REGISTRATION']?>
                                        </div>
                                    <? endif ?>
                                </td>
                            </tr>
                            <? foreach ($arResult['ITEMS'] as $item): ?>
                                <tr>
                                    <th>
                                        <div class="summit-price-block-table-border">
                                            <?=$item['NAME']?>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="summit-price-block-table-border">
                                            <span class="summit-price-block-table-value">
                                                <?=$item['PROPERTIES']['BEFORE']['VALUE']?>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="summit-price-block-table-border">
                                            <span class="summit-price-block-table-value">
                                                <?=$item['PROPERTIES']['AFTER']['VALUE']?>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            <? endforeach ?>
                            <tr>
                                <th>&nbsp;</th>
                                <td colspan="2">
                                    <div class="summit-price-block-table-charge">
                                        Цены указаны с учетом НДС 18%.
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="summit-price-block-right">
                    <div class="summit-price-block-card">
                        <div class="summit-price-block-card-icon">
                            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-summit-registration-users.svg"); ?>
                        </div>
                        BBCG предоставляет традиционные скидки постоянным участникам, и при регистрации 2-х и более представителей компании.
                    </div>

                    <div class="summit-price-block-card">
                        <div class="summit-price-block-card-icon">
                            <? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-summit-registration-discount.svg"); ?>
                        </div>
                        В случае предоставления описания 1 реализованного решения по оптимизации бизнеса — дополнительная скидка 15%.
                    </div>
                </div>
            </div>
        </div>
    </section>
<? endif ?>