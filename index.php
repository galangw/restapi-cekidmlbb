<?php
$idgame = $_GET['idgame'];
$idserver = $_GET['idserver'];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.duniagames.co.id/api/transaction/v1/top-up/inquiry/store?productId=1&itemId=66&catalogId=121&paymentId=805&gameId=' . $idgame . '&zoneId=' . $idserver . '&product_ref=CMS&product_ref_denom=AE',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_HTTPHEADER => array(
        'Host: api.duniagames.co.id',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:83.0) Gecko/20100101 Firefox/83.0',
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
$hasilcurl = json_decode($response, true);
$username =  $hasilcurl['data']['userNameGame'];
$json = array(
    // 'idgame' => $idgame,
    // 'server' => $idserver,
    'username' => $username,
);
echo json_encode($json);
