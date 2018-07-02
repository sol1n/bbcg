<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>

<? $APPLICATION->IncludeFile('/en/include/academy/promo-block.php'); ?>
<section id="academy-programm" class="programs-block p-b-xl">
        <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "academy-program",
         Array(
                 "VIEW_MODE" => "TEXT",
                 "SHOW_PARENT_NAME" => "N",
                 "IBLOCK_TYPE" => "retail",
                 "IBLOCK_ID" => COURCES_IBLOCK,
                 "SECTION_ID" => "",
                 "SECTION_CODE" => "",
                 "SECTION_URL" => "",
                 "COUNT_ELEMENTS" => "N",
                 "TOP_DEPTH" => "1",
                 "SECTION_FIELDS" => "",
                 "SECTION_USER_FIELDS" => "",
                 "ADD_SECTIONS_CHAIN" => "N",
                 "CACHE_TYPE" => "A",
                 "CACHE_TIME" => "360000",
                 "CACHE_NOTES" => "",
                 "CACHE_GROUPS" => "Y",
                 "LANG" => "en",
             

             )       
         );?>
         <div class="programs-block-description">
                You can download <a target=\"_blank\" href=\"/upload/retail-academy-cources-2018.pdf\">the list of programs for 2018</a> in pdf format</div>
</section>

<? $APPLICATION->IncludeFile('/en/include/academy/speakers-academy-block.php'); ?>
<? $APPLICATION->IncludeFile('/en/include/academy/news-block.php'); ?>
<? $APPLICATION->IncludeFile('/en/include/academy/registration-block.php'); ?>
<? $APPLICATION->IncludeFile('/en/include/academy/contacts-block.php'); ?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>

   
