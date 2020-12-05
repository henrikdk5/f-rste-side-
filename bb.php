<?php 
    $ch = curl_init("https://shop.rexdigital.group/api/v1/products/?api_key=hUVyZwTAYY4k0QTyZ5JEY2sMvVdTGDINzFmSTiR82blLqfPp");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);

    curl_close($ch);

    $response = json_decode($result);

    $products = $response->products->data ?? [];
?>