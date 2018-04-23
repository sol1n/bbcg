<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?> 

	<? $APPLICATION->IncludeFile('/en/include/blocks/events-block.php'); ?>

	<? if (is_null($user) or !isset($user['UF_SUBSCRIBE']) or ($user['UF_SUBSCRIBE'] != 1)): ?>
		<? include($_SERVER['DOCUMENT_ROOT'] . '/en/include/blocks/subscribe-block.php'); ?>
	<? endif ?>

	<? $APPLICATION->IncludeFile('/en/include/blocks/about-block.php'); ?>
	<? $APPLICATION->IncludeFile('/en/include/blocks/summits-block.php'); ?>
	<? $APPLICATION->IncludeFile('/en/include/blocks/speakers-block.php'); ?>
	<? $APPLICATION->IncludeFile('/en/include/blocks/news-block.php'); ?>
	<? $APPLICATION->IncludeFile('/en/include/blocks/programs-block.php'); ?>
	<? $APPLICATION->IncludeFile('/en/include/blocks/partners-block.php'); ?>
	<? $APPLICATION->IncludeFile('/en/include/blocks/register-iphone-block.php'); ?>
	<? $APPLICATION->IncludeFile('/en/include/blocks/iphone-block-mobile.php'); ?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>