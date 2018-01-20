<?
    $response = [];
    foreach ($arResult['ITEMS'] as $item)
    {
        $response[] = [
            'value' => $item['~NAME'],
            'data' => $item['ID'],
            'url' => $item['DETAIL_PAGE_URL']
        ];
    }

    echo json_encode(['suggestions' => $response]);
?>