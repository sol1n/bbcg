<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/news/(.*)/(.*)/.*#",
		"RULE" => "section=\$1&element=\$2",
		"PATH" => "/news/detail.php",
	),
	array(
		"CONDITION" => "#^/news/(.*)/.*#",
		"RULE" => "section=\$1",
		"PATH" => "/news/section.php",
	),
	array(
		"CONDITION" => "#^/speakers/(.*)/.*#",
		"RULE" => "element=\$1",
		"PATH" => "/speakers/detail.php",
	),
	array(
		"CONDITION" => "#^/(.*)/.*#",
		"RULE" => "element=\$1",
		"PATH" => "/summits/detail.php",
	)
);

?>
