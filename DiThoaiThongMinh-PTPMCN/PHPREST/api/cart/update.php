<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once('../../core/initialize.php');

$cart = new cart($db);
//lấy dữ liệu
header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/update_num_product_updateCart.php?id='.$_SESSION['product_id'].'&num='.$_SESSION['num'].'&id_cart='.$_SESSION['id_cart']);
?>