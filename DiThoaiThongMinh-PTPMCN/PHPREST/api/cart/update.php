<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once('../../core/initialize.php');

$cart = new cart($db);
//lấy dữ liệu
$data = json_decode(file_get_contents("update.txt"));
header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/update_num_product_updateCart.php?id='.$data->product_id.'&num='.$data->num.'&id_cart='.$data->id);
?>