<?php
	$title = 'Quản lý sản phẩm';
	$baseUrl = '../';
	require_once($baseUrl.'layouts/header.php');
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
</head>
<body>
    <div class="row">
        <div class= "col-md-12 table-responsive">
            <h3>Quản lí sản phẩm</h3>
            <a href="#"><button type="submit" class="btn btn-success" style="margin-top: 10px;">Thêm sản phẩm</button></a>
            <table class = "table table-bordered table-hover">
                <tr>
                    <th>STT</th>
                    <th>Mã SP</th>
                    <th>Tên SP</th>
                    <th>Giá nhập vào</th>
                    <th>Giá bán ra</th>
					<th>Giảm Giá</th>
					<th>Số lương</th>
					<th>Đơn Vị Tính</th>
                    <th>Thông tin SP</th>
					<th>Hãng SP</th>
                    <th>Hình sản phẩm</th>
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