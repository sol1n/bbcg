<?php
if(!empty($arResult['PROPERTIES']['BROADCAST_LINK']['VALUE'])): ?>
    <section class="sessions-block" id="broadcast-block">
        <div class="wrapper">
            <div class="sessions-block-header">
                <div class="sessions-block-header-left">
                    <h3 class="sessions-block-title">Видеотрансляция</h3>
                </div>
            </div>
            <iframe width="100%" height="450" src="<?=$arResult['PROPERTIES']['BROADCAST_LINK']['VALUE']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </div>
    </section>
<? endif; ?>
