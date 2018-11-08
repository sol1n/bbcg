<?php
if (!defined('B_PROLOG_INCLUDED') || (B_PROLOG_INCLUDED !== true)) {
    die();
}

if (!$arResult["NavShowAlways"]) {
    if (
       (0 == $arResult["NavRecordCount"])
       ||
       ((1 == $arResult["NavPageCount"]) && (false == $arResult["NavShowAll"]))
    ) {
        return;
    }
}


$letter = ($_REQUEST['letter'] != "" ? '&letter='.$_REQUEST['letter'] : ""); //add letter parameter for speaker filtration

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<div class="pagination text-center m-b-xl">
    <ul class="pagination-list">
      <? if ($arResult["NavPageNomer"] > 1): ?>
        <li class="pagination-list-item">
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageNomer"] - 1?><?=$letter?>" class="pagination-link pagination-link-prev">
              <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-pagination-prev.svg"); ?>
            </a>
        </li>
      <? else: ?>
        <li class="pagination-list-item disabled">
            <span class="pagination-link pagination-link-prev">
              <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-pagination-prev.svg"); ?>
            </span>
        </li>
      <? endif ?>

      <? while ($arResult["nStartPage"] <= $arResult["nEndPage"]): ?>

        <? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
          <li class="pagination-list-item active">
              <span class="pagination-link"><?=$arResult["nStartPage"]?></span>
          </li>
        <? else: ?>
          <li class="pagination-list-item">
              <a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?><?=$letter?>" class="pagination-link"><?=$arResult["nStartPage"]?></a>
          </li>
        <? endif ?>
        <? $arResult["nStartPage"]++ ?>
      <? endwhile ?>

      <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]): ?>
        <li class="pagination-list-item">
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageNomer"] + 1 ?><?=$letter?>" class="pagination-link pagination-link-next">
                <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-pagination-next.svg"); ?>
            </a>
        </li>
      <? else: ?>
        <li class="pagination-list-item disabled">
            <span class="pagination-link pagination-link-next">
                <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icons/icon-pagination-next.svg"); ?>
            </span>
        </li>
      <? endif ?>
    </ul>
</div>
