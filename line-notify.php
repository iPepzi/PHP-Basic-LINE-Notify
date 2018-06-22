<?php
header("Content-type: application/json; charset=utf-8");

define('LINE_API', 'https://notify-api.line.me/api/notify');
define('LINE_TOKEN', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');

//ข้อความสูงสุด 1000 ตัวอักษร
$message = 'ทดสอบ PHP';
 
$res = send_notify($message);
echo $res;


function send_notify($message)
{
	$headers = array(
		'Method: POST',
		'Content-type: application/x-www-form-urlencoded',
		'Authorization: Bearer '. LINE_TOKEN );
	
	$content = array('message' => $message);
	$content = http_build_query($content);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, LINE_API);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch); 
 
	return $result;
}


