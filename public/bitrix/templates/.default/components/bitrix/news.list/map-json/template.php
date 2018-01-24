<?php
	$items = [];
	foreach ($arResult['ITEMS'] as $item)
	{
		$items[] = [
			'name' => $item['NAME'],
			'description' => $item['PREVIEW_TEXT'],
			'coords' => [$item['PROPERTIES']['latitude']['VALUE'], $item['PROPERTIES']['longitude']['VALUE']],
			'type' => ($item['PROPERTIES']['type']['VALUE_XML_ID'] == 2) ? "main" : null
		];
	}

	echo json_encode(['objects' => $items]);
?>