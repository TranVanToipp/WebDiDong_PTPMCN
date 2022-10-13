<?php
session_start();
//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once('../../core/initialize.php');

$user = new user($db);

$user->fullname = $_SESSION['fullname'];
$user->email = $_SESSION['email'];
$user->phone_number = '';
$user->address = '';
$user->userName = $_SESSION['userName'];
$user->password = $_SESSION['password'];
//create User
if($user->create()){
	session_destroy();//hủy toàn bộ session.
	header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN');
}
else {echo 'error';}
?>