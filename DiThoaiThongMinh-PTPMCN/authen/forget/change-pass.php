<?php
 
// Kết nối database, session, general info
require_once '../../PHPREST/includes/config.php';
 
// Nếu không tồn tại $user
$user = 'nguyenvana';
if (!$user)
{
    header('Location: index.php'); // Di chuyển đến trang chủ
}
 
// Nhận dữ liệu và gán vào các biến đồng thời xử lý chuỗi
$old_pass = @($_POST['old_pass']);
$new_pass = @$_POST['new_pass'];
$re_new_pass = @$_POST['re_new_pass'];
 
// Các biến chứa code JS về thông báo
$show_alert = "<script>$('#formChangePass .alert').removeClass('hidden');</script>";
$hide_alert = "<script>$('#formChangePass .alert').addClass('hidden');</script>";
$success_alert = "<script>$('#formChangePass .alert').attr('class', 'alert alert-success');</script>";
$sql = "SELECT * FROM user WHERE userName ='".$user."'";
$stmt = $db->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
// Nếu mật khẩu cũ nhập đúng
if ($old_pass != $row['password'])
{
    echo $show_alert.'Mật khẩu cũ nhập không chính xác, đảm bảo đã tắt caps lock.';
}
    
// Ngược lại nếu độ dài mật khẩu mới nhỏ hơn 4 ký tự
// else if (strlen($new_pass) < 6)
// {
//     echo $show_alert.'Mật khẩu quá ngắn, hãy thử với mật khẩu khác an toàn hơn.';
//     echo $user;
//     echo " ";
//     echo $old_pass;
//     echo " ";
//     echo $new_pass;
// }

// Ngược lại nếu mật khẩu mởi nhập lại không khớp
else if ($new_pass != $re_new_pass)
{
    echo $show_alert.'Nhập lại mật khẩu mới không khớp, đảm bảo đã tắt caps lock.';
}
// Ngược lại
else
{
    $new_pass = ($new_pass);
    // Lệnh SQL đổi mật khẩu
    $sql_change_pass = "UPDATE user SET password = '$new_pass' WHERE userName ='".$user."'";
    // Thực hiện truy vấn
    $stmt = $db->prepare($sql_change_pass);
    $stmt->execute();
    // Giải phóng kết nối
     
    // Hiển thị thông báo và tải lại trang
    echo $show_alert.$success_alert.'Đổi mật khẩu thành công.';
}

?>