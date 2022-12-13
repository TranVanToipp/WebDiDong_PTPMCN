<?php

header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');

include_once('../../core/initialize.php');

$user = new user($db);
$user->id = isset($_POST['ID']) ? $_POST['ID'] : die();

//create user
if($user ->deleteUser()){
    echo "User deleted successfully";
}else{
    echo "Error deleting user";
}
?>