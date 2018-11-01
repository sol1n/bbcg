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

        <?php include $_SERVER['DOCUMENT_ROOT'] . "/include/banners/banner.php"; ?>

		<div id="recaptcha-placeholder"></div>

		<script src="/assets/build/scripts.min.js"></script>
		<? if (defined('NEED_MAP')): ?>
			<? if (SITE_LANGUAGE == 'en'): ?>
				<script src="//api-maps.yandex.ru/2.1/?lang=en_US&onload=initContactsMap"></script>
			<? else: ?>
				<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU&onload=initContactsMap"></script>
			<? endif ?>
		<? endif ?>
		<? if (defined('NEED_EVENTS_TABLE')): ?>
			<script src="/assets/build/program-table.min.js"></script>
		<? endif ?>

		<script src='https://www.google.com/recaptcha/api.js?onload=gCapthaInit&render=explicit'></script>

		<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/analytics/ga.php"; ?>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/analytics/yandex-metrika.php"; ?>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/analytics/facebook-pixel.php"; ?>
	</body>
</html>
