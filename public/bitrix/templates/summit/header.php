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
        <link rel="icon" type="image/png" href="favicon.png">
	</head>
	<body class="<?$APPLICATION->ShowProperty('color', 'red')?>-theme">

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