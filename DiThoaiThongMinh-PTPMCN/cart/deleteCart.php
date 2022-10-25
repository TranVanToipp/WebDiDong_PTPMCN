<?php
    session_start();
    ob_start();
    $titURL = "../../";
    if (isset($_SESSION['cart'])){
        if (isset($_GET['id'])){
            array_splice($_SESSION['cart'], $_GET['id'],1);
            header("Location:index.php");
        }else {
            unset($_SESSION['cart']);
           
        }
        // if (count($_SESSION['cart'])>0) {
        //     header("Location:../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/cart/index.php");
        // }else {
        //     header("Location:../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/cart/index.php");
        //     echo '
        //         <div class="container_giohang_isemty">
        //             <img src="../assets/img/cart/giohangis_emty.png" alt="Hình giỏ hàng trống" class="giohang_rong">
        //         </div>
        //         ';
        //     // header("Location:../");
            
        // }
    }

?>

<div class="container_giohang_isemty">
    <img src="../assets/img/cart/giohangis_emty.png" alt="Hình giỏ hàng trống" class="giohang_rong">
</div>