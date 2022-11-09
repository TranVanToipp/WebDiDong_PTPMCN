<?php

header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');

include_once('../../core/initialize.php');

$comment = new comment($db);
$comment->id = isset($_GET['id']) ? $_GET['id'] : die();

if($comment->deleteComment()){
    // "deleted successfully";
    header('Location:../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/chitietSP//index.php?id='.$_SESSION['product_id_comments']);
}else{
    header('Location:../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/chitietSP//index.php?id='.$_SESSION['product_id_comments']);
    // "Error deleting";
}
?>