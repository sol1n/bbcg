<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?> 
	<? $APPLICATION->IncludeFile('/include/blocks/events-block.php'); ?>

	<? if (is_null($user) or !isset($user['UF_SUBSCRIBE']) or ($user['UF_SUBSCRIBE'] != 1)): ?>
		<? include($_SERVER['DOCUMENT_ROOT'] . '/include/blocks/subscribe-block.php'); ?>
	<? endif ?>

	<? $APPLICATION->IncludeFile('/include/blocks/about-block.php'); ?>
	<? $APPLICATION->IncludeFile('/include/blocks/summits-block.php'); ?>
	<? $APPLICATION->IncludeFile('/include/blocks/speakers-block.php'); ?>
	<? $APPLICATION->IncludeFile('/include/blocks/news-block.php'); ?>
	<? $APPLICATION->IncludeFile('/include/blocks/programs-block.php'); ?>
	<? $APPLICATION->IncludeFile('/include/blocks/partners-block.php'); ?>
	<? $APPLICATION->IncludeFile('/include/blocks/register-iphone-block.php'); ?>
	<? $APPLICATION->IncludeFile('/include/blocks/iphone-block-mobile.php'); ?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>