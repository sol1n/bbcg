<?php
	$items = [];
	foreach ($arResult['ITEMS'] as $item)
	{
        $placemark_name = $item['NAME'];
        $placemark_description = $item['PREVIEW_TEXT'];
        if ($arParams['LANG'] == 'en'){
            if(!empty($item['PROPERTIES']['en_name']['VALUE'])){
                $placemark_name = $item['PROPERTIES']['en_name']['VALUE'];
            }
            if(!empty($item['PROPERTIES']['en_description']['VALUE'])){
                $placemark_description = $item['PROPERTIES']['en_description']['VALUE']['TEXT'];
            }
        }
		$items[] = [
			'name' => $placemark_name,
			'description' => $placemark_description,
			'coords' => [$item['PROPERTIES']['latitude']['VALUE'], $item['PROPERTIES']['longitude']['VALUE']],
			'type' => ($item['PROPERTIES']['type']['VALUE_XML_ID'] == 2) ? "main" : null
		];
	}

	echo json_encode(['objects' => $items]);
?>
