<?php
//Данные для передачи
$ip = $_SERVER['REMOTE_ADDR'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$subid = $_POST['subid'];



$site_id = '3622'; //ID Лендинга
$out_order_id = rand(232145678, 345321567);
$country = 'RU'; //Гео оффера
$api_key = '85979400b743d0c366efe194ba6577a4'; //Api-ключ
$key = '85979400b743d0c366efe194ba6577a4'; //Api-ключ
$UserAgent=$_SERVER['HTTP_USER_AGENT'];
$referer=$_SERVER['HTTP_REFERER'];

$post_data = array('fio'          => $name,
                      'phone'        => $phone,
                      'sub_id'        => $subid,
                      /*'address'      => 'г.Москва ул. Пушкинская д.1 кв.1',*/
                      'site_id'      => $site_id, # $site_id в нашей системе
                      'out_order_id' => 1, # номер заказа в вашей системе
                      'country'      => $country, # UA, RU, BY ...
                      'ip'           => $ip,
                      'ua'           => $UserAgent, # User Agent браузера
                      'referer'      => $referer,); # $_SERVER['HTTP_REFERER']

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_HEADER, true);
   curl_setopt($ch, CURLOPT_NOBODY, FALSE);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_POST, TRUE);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

   curl_setopt($ch, CURLOPT_URL, 'https://thank-you.pro/api.php?method=order_add&key='.$key);

   $res = curl_exec($ch); # Ответ в json

/*
$params = array(

'fio' => $name,
'phone' => $phone,
'site_id' => $site_id,
'out_order_id' => $out_order_id,
'country' => $country,
'ip' => $ip

);

if($curl = curl_init()){
http://ctr.ru/api.php?key=api_key&method=api_method&a=1&b=2&c=...
curl_setopt($curl, CURLOPT_URL, 'http://ctr.ru/api.php?method=api_method&key='.$api_key);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
$resp = curl_exec($curl); 
curl_close($curl);

}
*/
header ('Location: success.html');



?>