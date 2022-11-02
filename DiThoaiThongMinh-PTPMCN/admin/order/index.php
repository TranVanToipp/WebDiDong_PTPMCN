<?php
	$title = 'Quản lý Hóa Đơn';
	$baseUrl = '../';
	require_once($baseUrl.'layouts/header.php');
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn</title>
</head>
<body>
    <div class="row" >
        <div class= "col-md-12 table-responsive">
            <h3>Quản lí Hóa Đơn</h3>
			<form method="post">
			<a>
			<select id="hd" name="hoadon" class="btn btn-success">
				<option value="1">Tất Cả Hóa Đơn</option>
				<option value="2">Hóa Đơn Đang Duyệt</option>
                <option value="3">Hóa Đơn Thành Công</option>
				<option value="4">Hóa Đơn Đã Hủy</option>
			</select>
			</a>
			<a><button name="xem" type="submit" class="btn btn-success" style="margin-top: -2px;margin-left: 10px;">Xem Hóa Đơn</button></a>
			</form>
            <table class = "table table-bordered table-hover">
                <tr>
                    <th>STT</th>
                    <th>Mã HĐ</th>
                    <th>Mã SP</th>
					<th>Tên SP</th>
                    <th>Mã KH</th>
                    <th>Số Lượng</th>
                    <th>Trạng Thái</th>
					<th>Ngày HĐ</th>
                    <th>Thành Tiền</th>
                    <th style="width: 50px;">Tùy chỉnh</th>
					<th style="width: 50px;">Tùy chỉnh</th>
					<th style="width: 50px;">Tùy chỉnh</th>
                </tr>

            </table>
        </div>
    </div>
	
</body>
</html>
<?php
	
    require_once($baseUrl.'layouts/footer.php');
?>
	