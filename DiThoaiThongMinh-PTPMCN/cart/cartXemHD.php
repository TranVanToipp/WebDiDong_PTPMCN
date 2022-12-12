<?php
    ob_start();
?>
<?php
    $title = 'Giỏ hàng';
    $baseUrl = '../';
    include_once ($baseUrl.'FE/Layout/header.php');
?>
<link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/cart.css">

<div class="grid wide ">
    <div class="container-cart__order">
    <div class="l-3 left-cart">
        
        <a href="" class="cart-left_danhsachdon">
            Danh sách đơn hàng đã mua
        </a>
    </div>
    <div class="l-9 right-cart">
        <div class="user-dathang">
            <div class="user-dathang__left">
                <p class="ten-user__dathang">Chào bạn -</p>
                <p class="ten-user__dathang">NguyenVana</p>

                <p class="sodienthoai-user__dathang">043434355</p>
            </div>
            <div class="user-dathang__right">
                
            </div>
        </div>
        <div class="list-danhsach__order">
            <b>Đơn hàng đã mua gần đây</b>
            <div class="group-list__order">
                <i>i</i>
                <div>Đây là danh sách đơn hàng bạn đã mua từ ngày
                </div>
                <b>27/10/2020</b>
            </div>
            <table class="bang-orer">
                <tbody>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>sản phẩm</th>
                        <th>giá</th>
                        <th>ngày đặt mua</th>
                        <th>trạng thái</th>
                    </tr>
                    <tr class="cot-order">
                        <td>
                            <a href="" class="">#62752111</a>
                        </td>
                        <td>
                            <a href="" class="order_item">
                                <img src="../assets/img/iphone22.jpg" alt="" class="order_item-img">
                            </a>
                            <div class="order-content">
                                <a href="" class="name-product__order">Vivo V23e xanh hồng Vivo V23e xanh hồngVivo V23e xanh hồng V</a>
                                <div class="deliverytime">Dự kiến giao: Trước 10:00 27/10/2022</div>
                            </div>
                        </td>
                        <td>
                            <b class="price-product__order">7.490.000₫</b>
                        </td>
                        <td>
                            <span class="date-product__order">27/10/2022</span>
                        </td>
                        <td>
                            <span class="data-status">Chờ xác nhận</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>

<?php 
    require_once("../FE/Layout/footer.php");
?>