<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
	</main>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/footer.php"; ?>

		<div id="recaptcha-placeholder"></div>

		<script src="/assets/build/scripts.min.js<?=rand(0, 99999)?>"></script>
		<? if (defined('NEED_MAP')): ?>
			<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU&onload=initMaps"></script>
		<? endif ?>
		<? if (defined('NEED_EVENTS_TABLE')): ?>
			<script src="/assets/build/program-table.js"></script>
		<? endif ?>

		<script src='https://www.google.com/recaptcha/api.js?onload=gCapthaInit&render=explicit'></script>
	</body>
</html>