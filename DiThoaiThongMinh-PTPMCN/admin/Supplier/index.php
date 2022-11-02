<?php
	$title = 'Quản lý nhà cung cấp';
	$baseUrl = '../';
	require_once($baseUrl.'layouts/header.php');
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà Cung Cấp</title>
</head>
<body>
<style> 
	.nav-item:nth-child(8) {
		background-color: #c1c1c1;
	}
</style>
<div class="row">
	<div class="col-md-12" style="margin-top: 30px;">
		<h3>Quản lý nhà cung cấp</h3>
		<a href="editor.php"><button type="submit" class="btn btn-success" style="margin-top: 10px;">Thêm Nhà Cung Cấp</button></a>
	</div>
	
	<div style="margin-top: 15px;">
		<table class="table table-bordered table-hover" >
				<tr>
					<th>STT</th>
					<th>Mã nhà cung cấp</th>
                    <th>Tên nhà cung cấp</th>
                    <th>Địa chỉ nhà cung cấp</th>
                    <th>Số DT</th>
                    <th>Thông tin thêm</th>
                    <th>Ngày hợp đồng</th>
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