<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');



include_once('../../core/initialize.php');

$product = new product($db);
$product->id = isset($_GET['id']) ? $_GET['id'] : die();


//create User
if($product->delete_product()){
	header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/cart');
}
else {echo 'error';}

?>