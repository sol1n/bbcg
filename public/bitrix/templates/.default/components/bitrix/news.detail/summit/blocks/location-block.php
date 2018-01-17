<? 
    use \Bitrix\Main\Localization\Loc;
?>
<? if ($arResult['PROPERTIES']['ADDRESS']['VALUE']): ?>
    <section class="location-block">
        <div class="wrapper">
            <div class="location-block-title">
                <?=Loc::GetMessage('LOCATION', [], $arParams['LANG'])?>
            </div>
            <div class="location-block-desc">
                <?=$arResult['PROPERTIES']['ADDRESS']['VALUE']?>
            </div>
        </div>

        <?
            $latitude = $arResult['PROPERTIES']['LATITUDE']['VALUE'];
            $longitude = $arResult['PROPERTIES']['LONGITUDE']['VALUE'];
            $map = [
                'center' => "$latitude, $longitude",
                'zoom' => 16,
                'placemark' => [
                    'name' => $arResult['NAME'],
                    'center' => "$latitude, $longitude",
                ]
            ]
        ?>

        <div class="location-block-map" data-maps='<?=json_encode($map)?>'></div>
    </section>
<? endif ?>