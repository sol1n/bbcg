<? 
    use \Bitrix\Main\Localization\Loc;
?>
<? if ($arResult['ITEMS']): ?>
    <section class="summit-price-block" id="summit-pricing-block">
        <div class="wrapper">
            <h3 class="summit-price-block-title">
                <?=Loc::GetMessage('PARTICIPATE_PRICING', [], $arParams['LANG'])?>
            </h3>

            <div class="summit-price-block-row">
                <div class="summit-price-block-left">
                    <div style="overflow-x: auto">
                        <table class="summit-price-block-table">
                            <tr class="summit-price-block-table-heading">
                                <th>
                                    <div class="summit-price-block-table-title">
                                        <?=Loc::GetMessage('REGISTRATION_TYPE', [], $arParams['LANG'])?>
                                    </div>
                                </th>
                                <td>
                                    <div class="summit-price-block-table-title">
                                        <?=Loc::GetMessage('REGISTRATION', [], $arParams['LANG'])?>
                                    </div>
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
                                        <?=Loc::GetMessage('PRICE_SPECIFIED_WITH_NDS', [], $arParams['LANG'])?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="summit-price-block-right"></div>
            </div>
        </div>
    </section>
<? endif ?>