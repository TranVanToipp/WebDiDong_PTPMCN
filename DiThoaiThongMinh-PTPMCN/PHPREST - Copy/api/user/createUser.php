<?php
session_start();
//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once('../../core/initialize.php');

$user = new user($db);

$fullname = $_SESSION['fullname'];
$email = $_SESSION['email'];
$userName = $_SESSION['userName'];
$password = $_SESSION['password'];
$phone_number = '';
$address = '';
$role_id = 2;

$user->fullname = $fullname;
$user->email = $email;
$user->phone_number = $phone_number;
$user->address = $address;
$user->userName = $userName;
$user->password = $password;
$user->role_id = $role_id;
//create User
if($user->create()){
	header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN');
}
else {
	echo 'error';
}
?>