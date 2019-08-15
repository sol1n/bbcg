<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html lang="<?php echo SITE_LANGUAGE ?>">
	<head>
	    <?$APPLICATION->ShowHead();?>
	    <meta name="viewport"
	          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	    <title><?$APPLICATION->ShowTitle();?></title>
	    <link rel="stylesheet" href="/assets/build/style.min.css">
	    <meta name="theme-color" content="#1b1b1b">
        <link rel="icon" type="image/png" href="/favicon.png">

        <meta property="og:title" content="<?$APPLICATION->ShowTitle();?>" />
	    <meta property="og:description" content="<?$APPLICATION->ShowProperty("description");?>">
	    <meta property="og:image" content="<?$APPLICATION->ShowProperty("image", '/assets/images/tmp/events/about-summit-bg.jpg');?>">
   		<meta property="og:image:url" content="<?$APPLICATION->ShowProperty("image", '/assets/images/tmp/events/about-summit-bg.jpg');?>">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/include/analytics/ga.php"; ?>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/analytics/yandex-metrika.php"; ?>
	</head>
	<? if (CSite::InDir('/summits/') || CSite::InDir('/en/summits/')): ?>
		<body class="b-smoke-white">
	<? else: ?>
		<body class="<?$APPLICATION->ShowProperty('color', 'red')?>-theme">
	<? endif ?>

		<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/summit/check-exists.php"; ?>

		<? $user = user(); ?>

		<? if (is_null($summit)): ?>
			<? if (SITE_LANGUAGE == 'en'): ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/en/include/blocks/header.php"; ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/en/include/blocks/offcanvas.php"; ?>
			<? else: ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/header.php"; ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/offcanvas.php"; ?>
			<? endif ?>
		<? else: ?>
			<? if (SITE_LANGUAGE == 'en'): ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/en/include/blocks/header-global.php"; ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/en/include/blocks/header-for-event.php"; ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/en/include/blocks/offcanvas-event.php"; ?>
			<? else: ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/header-global.php"; ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/header-for-event.php"; ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/offcanvas-event.php"; ?>
			<? endif ?>
		<? endif ?>

		<main class="main-container main-container-with-header">
