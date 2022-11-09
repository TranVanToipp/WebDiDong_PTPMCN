<?php
session_start();
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');

include_once('../../core/initialize.php');

$comment = new comment($db);
$comment->id = isset($_GET['id']) ? $_GET['id'] : die();
$comment->deleteComment();
header('Location:../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/chitietSP/index.php?id='.$_SESSION['product_id_comments']);
?>