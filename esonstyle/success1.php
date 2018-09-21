<?php

$name = isset($_POST['name']) ? $_POST['name'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$data = array(
    'name' => trim(strip_tags($_POST['name'])),
    'phone' => trim(strip_tags($_POST['phone'])),
    'countryCode' => trim(strip_tags($_POST['countryCode'])),
    'comment' => trim(strip_tags($_POST['comment'])),
    'number' => trim(strip_tags($_POST['number'])),
    'offerId' => trim(strip_tags($_POST['offerId'])),
    'landingUrl' => trim(strip_tags($_POST['landingUrl'])),
    'createdAt' => trim(strip_tags($_POST['createdAt'])),
    'sub1' => trim(strip_tags($_POST['sub1'])),
    'sub2' => trim(strip_tags($_POST['sub2'])),
    'sub3' => trim(strip_tags($_POST['sub3'])),
    'sub4' => trim(strip_tags($_POST['sub4'])),
    'userAgent' => $_SERVER['HTTP_USER_AGENT'],
    'ip' => $_SERVER['REMOTE_ADDR']
);

if ($curl = curl_init()){
    curl_setopt($curl, CURLOPT_URL, 'http://shakes.pro/index.php?r=api/order/in&key=aae7406ee85b473c685084e22cd90fd1');//"74d0b793d6abf81898e8d88bd8e73164" МЕНЯЕМ НА СВОЙ API КЛЮЧ ИЗ ПРОФИЛЯ!!!!!!!!
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    $result = curl_exec($curl);
}

var_dump($data);
var_dump($result);

?>