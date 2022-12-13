<?php
    session_start();
    ob_start();
    $titURL = "../../";
    if (isset($_SESSION['cart'])>0){
        if (isset($_GET['id'])){
            array_splice($_SESSION['cart'], $_GET['id'],1);
            header("Location:index.php");
        }else {
            unset($_SESSION['cart']);
        }
        if (count($_SESSION['cart'])>0) {
            header("Location:index.php");
        }else {
            header("Location:../");
            
        }
    }else {
        header("Location:../");
    }

?>