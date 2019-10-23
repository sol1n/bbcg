<?php
if(!empty($arResult['PROPERTIES']['BROADCAST_LINK']['VALUE']['TEXT']) && ($arResult['PROPERTIES']['BROADCAST_PROMO']['VALUE'] != 'Y')): ?>
    <section class="sessions-block" id="broadcast-block">
        <div class="wrapper">
            <div class="sessions-block-header">
                <div class="sessions-block-header-left">
                    <h3 class="sessions-block-title">Видеотрансляция</h3>
                </div>
            </div>
            <?=$arResult["PROPERTIES"]["BROADCAST_LINK"]["~VALUE"]["TEXT"];?>
        </div>
    </section>
<? endif; ?>
