<?php
$merchantId = '18904';
$password = '<password>';
$orderCode = "QkYWdh27Qz";


$hashText = $merchantId;
$hashText .= $orderCode;
$hashText .= $password;

$md5Hash = md5($hashText);

$url = sprintf(
    'https://ganvadeba.credo.ge/widget/api.php?merchantId=%s&orderCode=%s&hash=%s',
    $merchantId,
    $orderCode,
    $md5Hash
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: application/json'
));

$curl_exec = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}else {
    curl_close($ch);
    $response = json_decode($curl_exec, true);

    echo "<pre>";
    print_r($response);
}

?>