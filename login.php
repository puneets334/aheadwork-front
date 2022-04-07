<?php

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => 'http://127.0.0.1:8000/api/login',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => 'email='.$_POST['email'].'&password='.$_POST['password'],
	CURLOPT_HTTPHEADER => array(
		'Content-Type: application/x-www-form-urlencoded'
	),
));

$response = curl_exec($curl);
curl_close($curl);
$data = json_decode($response ,true);

if(!empty($data) && $data['success'] === true){
	$_SESSION['token'] = $data['token'];
	header('Location: ticket.php');
}

 ?>