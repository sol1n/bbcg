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
        <? if (!CSite::InDir('/exclusive/')): ?>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/include/banners/banner.php"; ?>
        <? endif ?>

		<div id="recaptcha-placeholder"></div>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://webtracking-v01.bpmonline.com/JS/create-object.js"></script> 
        <script src="https://webtracking-v01.bpmonline.com/JS/track-cookies.js"></script>
        <script type="text/javascript">
            (function (d, s, i, r) {
                if (d.getElementById(i)) { return; }
                var n = d.createElement(s);
                e = d.getElementsByTagName(s)[0];
                n.id = i;
                n.src = "https://webtracking-v01.bpmonline.com/Src/tracking_" + r + ".js"; e.parentNode.insertBefore(n, e);
            })
            (document, "script", "bpmTracking", "2x0FkbAH5pSraa43iDn21mAzzm7xZ7WFISnxiCKJ");
        </script>

        <script src="/assets/build/scripts.min.js"></script>
		<? if (defined('NEED_MAP')): ?>
			<? if (SITE_LANGUAGE == 'en'): ?>
				<script src="//api-maps.yandex.ru/2.1/?lang=en_US&onload=initContactsMap"></script>
			<? else: ?>
				<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU&onload=initContactsMap"></script>
			<? endif ?>
		<? endif ?>

		<script src='https://www.google.com/recaptcha/api.js?onload=gCapthaInit&render=explicit'></script>

		<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/analytics/ga.php"; ?>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/analytics/yandex-metrika.php"; ?>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/include/analytics/facebook-pixel.php"; ?>
	</body>
</html>
