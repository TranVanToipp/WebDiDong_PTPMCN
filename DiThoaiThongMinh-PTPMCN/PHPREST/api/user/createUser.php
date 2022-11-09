<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once('../../core/initialize.php');

$user = new user($db);

function rdMaUser($length = 7) {
	$contentMa = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$contentLength = strlen($contentMa);
	$randomMaUser = '';
	for($i = 0; i < $length; $i++) {
		$randomMaUser .= $contentMa[rand(0,$$contentLength-1)];
	}
	return $randomMaUser;
}

function layMaUser() {
	$url="http://localhost/webDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/orders/select_order_id.php";
	$json = file_get_contents($url);
	$data = json_decode($json);
}

$fullname = $_SESSION['fullname'];
$email = $_SESSION['email'];
$userName = $_SESSION['userName'];
$password = $_SESSION['password'];

$user->fullname = $fullname;
$user->email = $email;
$user->phone_number = $phone_number;
$user->address = $address;
$user->userName = $userName;
$user->password = $password;
//create User
if($user->create()){
	header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN');
}
else {
	echo 'error';
}
?>