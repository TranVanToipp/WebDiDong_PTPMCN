<?php
session_start();
//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once('../../core/initialize.php');

$orders = new orders($db);

//lấy dữ liệu
$orders->maHD = $_SESSION['maHD'];
$orders->status = "Đơn Đã Hủy";

if($orders->update()){
    header  ("Location:../../../");
}
?>