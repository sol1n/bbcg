<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
	</main>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/blocks/footer.php"; ?>

		<script src="/assets/build/scripts.min.js"></script>
		<? if (defined('NEED_MAP')): ?>
			<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU&onload=initMaps"></script>
		<? endif ?>
		<? if (defined('NEED_EVENTS_TABLE')): ?>
			<script src="/assets/build/program-table.js"></script>
		<? endif ?>
	</body>
</html>