<?php
//Данные для передачи
$ip = $_SERVER['REMOTE_ADDR'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$code = gnx1g; //Код потока
$subid1="adid";
$subid2="adsetname";
$subid3="placement";
$subid=$subid1.":".$subid2.":".$subid3;
 
$api_key = 'e9d8b87f09ed5867fed16d0987bdfe7f'; //Api ключ

$params = array(

'client' => $name,
'tel' => $phone,
'ip' => $ip,
'code' => $code,
'subid' => $subid,
'traffic_type' => '0'

);

if($curl = curl_init()){

curl_setopt($curl, CURLOPT_URL, 'http://api.monsterleads.pro/method/order.add?api_key='.$api_key);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
$resp = curl_exec($curl); 
curl_close($curl);

}

header ('Location: success.html');

?>