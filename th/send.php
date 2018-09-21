<?php
//Данные для передачи
$ip = $_SERVER['REMOTE_ADDR'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$login = 'gelauwiy@yandex.ru'; //Ваш e-mail
$password = 'common2us'; //Ваш пароль
$flow = 'V1IX5U'; //Код потока
$price = '990'; //Цена товара

$data1 = $_POST['subid1']; //subid
$data2 = $_POST['subid2']; //subid
$data3 = $_POST['subid3']; //subid

if($curl = curl_init()) {

curl_setopt($curl, CURLOPT_URL, 'http://api.kma1.biz');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, "method=auth&username=$login&pass=$password");
$resp = curl_exec($curl);
$arr = json_decode($resp, true);

if($arr['code'] == 0 ){

$authid = $arr['authid'];
$authhash = $arr['authhash'];

}


$params = array(

'method' => addlead,
'authid' => $authid,
'authhash' => $authhash,
'ip' => $ip,
'channel' => $flow,
'name' => $name,
'phone' => $phone,
'data1' => $data1,
'data2' => $data2,
'data3' => $data3,
'price' => $price

);

curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
$resp = curl_exec($curl); 
//echo $resp;
curl_close($curl);

}

header ('Location: success.html');