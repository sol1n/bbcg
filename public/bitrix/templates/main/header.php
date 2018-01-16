<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<html lang="ru">
	<head>
	    <?$APPLICATION->ShowHead();?>
	    <meta name="viewport"
	          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	    <title><?$APPLICATION->ShowTitle();?></title>
	    <link rel="stylesheet" href="/assets/build/style.min.css">
	    <meta name="theme-color" content="#1b1b1b">
	</head>
	<body class="blue-theme">

		<? $user = user(); ?>

		<? if (SITE_LANGUAGE == 'en'): ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . "/en/include/blocks/header.php"; ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . "/en/include/blocks/offcanvas.php"; ?>
		<? else: ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/header.php"; ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/offcanvas.php"; ?>
		<? endif ?>
		
		<main class="main-container main-container-with-header">