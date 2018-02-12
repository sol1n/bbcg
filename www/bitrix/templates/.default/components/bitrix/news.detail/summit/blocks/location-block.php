<? 
    use \Bitrix\Main\Localization\Loc;
?>
<? if ($arResult['PROPERTIES']['ADDRESS']['VALUE']): ?>
    <section class="location-block">
        <div class="wrapper">
            <h3 class="location-block-title">
                <?=Loc::GetMessage('LOCATION', [], $arParams['LANG'])?>
            </h3>
            <div class="location-block-desc">
                <?=$arResult['PROPERTIES']['ADDRESS']['VALUE']?>
            </div>
        </div>

        <?
            $latitude = $arResult['PROPERTIES']['LATITUDE']['VALUE'];
            $longitude = $arResult['PROPERTIES']['LONGITUDE']['VALUE'];
        ?>
        <div 
            id="js-contacts-map"
            class="location-block-map"
            data-map-coords="<?="$latitude, $longitude"?>"
            data-map-zoom="16"
            data-map-data="/api/map/?summit=<?=$arResult['ID']?>"
        ></div>
    </section>
<? endif ?>