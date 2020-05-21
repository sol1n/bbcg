<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

CModule::IncludeModule("iblock");

$arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE","PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>COURCES_IBLOCK, "ACTIVE"=>"Y","CODE"=>$_REQUEST['code']);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement()){
    $arFields = $ob->GetFields();
    $arProps = $ob->GetProperties();
}

$link = CFile::GetPath($arProps["PROGRAM_LINK"]["VALUE"]);

header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=\"".$arFields["NAME"].".pdf\"");
@readfile($_SERVER['DOCUMENT_ROOT'].$link);
?>
