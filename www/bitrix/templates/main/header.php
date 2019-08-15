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
	</head>
	<? if (CSite::InDir('/summits/') || CSite::InDir('/en/summits/')): ?>
		<body class="b-smoke-white">
	<? else: ?>
		<body>
	<? endif ?>

		<? $user = user(); ?>

		<? if (SITE_LANGUAGE == 'en'): ?>
			<? if (CSite::InDir('/en/academy/')): ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/en/include/blocks/header-global.php"; ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/en/include/blocks/header-for-academy.php"; ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/en/include/blocks/offcanvas-for-academy.php"; ?>
			<? else: ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/en/include/blocks/header.php"; ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/en/include/blocks/offcanvas.php"; ?>
			<? endif ?>
		<? else: ?>

			<? if (CSite::InDir('/academy/')): ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/header-global.php"; ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/header-for-academy.php"; ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/offcanvas-for-academy.php"; ?>
			<? else: ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/header.php"; ?>
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/offcanvas.php"; ?>
			<? endif ?>
		<? endif ?>

		<main class="main-container main-container-with-header">
