<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once('../../core/initialize.php');

$user = new user($db);
//lấy dữ liệu
$data = json_decode(file_get_contents("input.txt"));

$user->fullname = $data->fullname;
$user->email = $data->email;
$user->phone_number = $data->phone_number;
$user->address = $data->address;
$user->userName = $data->userName;
$user->password = $data->password;
//create User
if($user->create()){
	header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/user/read_user.php');
}
else {echo 'error';}
?>