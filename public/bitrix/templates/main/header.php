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
	<body>
		<? /* templates/blocks/header */ ?>
		<header class="main-header">
		    <div class="wrapper">
		        <a href="/" class="main-header-toggler js-offcanvas">
		        	<? echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/icon-hamburger-menu.svg') ?>
		        </a>
		        <div class="main-header-logo">
		            <a href="/">
		                <img src="/assets/images/logo.svg" alt="BBCG — B2B Conference Group">
		            </a>
		        </div>
		        <div class="main-header-mobile-logo">
		            <a href="/">
		                <img src="/assets/images/logo-min.svg" alt="BBCG — B2B Conference Group">
		            </a>
		        </div>
		        <nav class="main-header-menu">
		            <ul>
		                <li>
		                    <a href="/about/">О компании</a>
		                </li>
		                <li class="parent">
		                    <a href="/summits/">Календарь саммитов</a>
		                </li>
		                <li>
		                    <a href="/academy/">Академия ретейла</a>
		                </li>
		                <li>
		                    <a href="/news/">Новости</a>
		                </li>
		                <li>
		                    <a href="/contacts/">Контакты</a>
		                </li>
		            </ul>
		        </nav>

		        <div class="main-header-lang">
		            <a href="#" class="main-header-lang-item active">Рус</a>
		            <a href="#" class="main-header-lang-item">Eng</a>
		        </div>

		        <div class="main-header-userarea">
		            <div class="main-header-userarea-login-register">
		                <a href="login.php" data-side-modal data-side-modal-url="blocks/modal-login.php" data-side-modal-class="login-modal">
		                    Войти
		                </a>
		                <a href="registration.php" data-side-modal data-side-modal-prevent-mobile data-side-modal-url="blocks/modal-registration.php" data-side-modal-class="registration-modal" data-side-modal-prevent-overlay-close data-side-modal-prevent-esc-close>
		                    Регистрация
		                </a>
		            </div>
		        </div>
		    </div>
		</header>
		
		<? /* templates/blocks/offcanvas */ ?>
		<div id="offcanvas" class="main-offcanvas-overlay">
		    <div class="main-offcanvas">
		        <div class="main-offcanvas-body">
		            <ul class="main-offcanvas-menu">
		                <li class="active">
		                    <a href="/about/">
		                        О компании
		                    </a>
		                </li>
		                <li>
		                    <a href="/summits/">
		                        Календарь саммитов
		                    </a>
		                </li>
		                <li>
		                    <a href="/academy/">
		                        Академия ретейла
		                    </a>
		                </li>
		                <li>
		                    <a href="/news/">
		                        Новости
		                    </a>
		                </li>
		                <li>
		                    <a href="/contacts/">
		                        Контакты
		                    </a>
		                </li>
		            </ul>

		            <div class="main-offcanvas-padding">
		                <div class="main-offcanvas-userarea">
		                    <div class="main-offcanvas-userarea-login-register">
		                        <a href="login.php" data-side-modal data-side-modal-url="blocks/modal-login.php" data-side-modal-class="login-modal">
		                            Войти
		                        </a>
		                        <a href="registration.php" data-side-modal data-side-modal-prevent-mobile data-side-modal-url="blocks/modal-registration.php" data-side-modal-class="registration-modal" data-side-modal-prevent-overlay-close data-side-modal-prevent-esc-close>
		                            Регистрация
		                        </a>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="main-offcanvas-footer">
		            <div class="text-center">
		                <div class="main-offcanvas-lang">
		                    <a href="#" class="main-offcanvas-lang-item active">Рус</a>
		                    <a href="#" class="main-offcanvas-lang-item">Eng</a>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>