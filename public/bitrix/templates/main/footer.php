<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
	</main>
		<? if (SITE_LANGUAGE == 'en'): ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . "/en/include/blocks/footer.php"; ?>
		<? else: ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/footer.php"; ?>
		<? endif ?>

		<div id="recaptcha-placeholder"></div>

		<script src="/assets/build/scripts.min.js"></script>
		<? if (defined('NEED_MAP')): ?>
			<? if (SITE_LANGUAGE == 'en'): ?>
				<script src="//api-maps.yandex.ru/2.1/?lang=en_US&onload=initMaps"></script>
			<? else: ?>
				<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU&onload=initMaps"></script>
			<? endif ?>
		<? endif ?>

		<script src='https://www.google.com/recaptcha/api.js?onload=gCapthaInit&render=explicit'></script>
	</body>
</html>