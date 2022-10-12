<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');



include_once('../../core/initialize.php');

$cart = new cart($db);
$cart->id = isset($_GET['id']) ? $_GET['id'] : die();


//create User
if($cart->deletes()){
	header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/cart');
}
else {echo 'error';}

//url ='http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/cart/delete.php?id='.$id.';
?>