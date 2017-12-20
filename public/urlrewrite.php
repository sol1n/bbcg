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
	)
);

?>
