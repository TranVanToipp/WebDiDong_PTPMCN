<?php
	include_once ("../check_adm.php");
?>
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
            <a href="editor.php"><button type="submit" class="btn btn-success" style="margin-top: 10px;">Thêm sản phẩm</button></a>
            <table class = "table table-bordered table-hover">
                <tr>
                    <th>STT</th>
					<th>id</th>
                    <th>Tên SP</th>
                    <th>Giá nhập vào</th>
                    <th>Giá bán ra</th>
					<th>Giảm Giá</th>
					<th>Số lương</th>
                    <th>Thông tin SP</th>
					<th>Loại SP</th>
                    <th>Hình sản phẩm</th>
                    <th style="width: 50px;">Tùy chỉnh</th>
                </tr>
<?php
$url = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/selectAll.php';
$json = file_get_contents($url);
$data = json_decode($json);
$index = 1;
if(isset($data->data)){
	foreach($data->data as $item){
		echo 
		'<tr>
			<td>'.($index++).'</td>
			<td>'.$item->id.'</td>
			<td>'.$item->title.'</td>
			<td>'.$item->price.'</td>
			<td>'.($item->price-$item->price*$item->discount/100).'</td>
			<td>'.($item->discount).'%</td>
			<td>'.$item->num.'</td>
			<td>'.$item->description.'</td>
			<td>'.$item->product_type_name.'</td>
			<td><img src="image/'.$item->thumnail.'" style="height: 120px; width: 100px;"></td>
			<th style="width: 40px; height:40px;" >
				<button class="btn btn-warning" onclick=\'window.open("editor.php?id='.$item->id.'","_self")\'>Edit</button></a>
			</th>
		</tr>';
	}
}
?>
            </table>
        </div>
    </div>
</body>
</html>

<script>
function deleteProduct(ID) {
		option = confirm('Bạn có muốn xoá Sản Phẩm này không');
		if(!option) {
			return;
		}
		$.post('process_delete.php', {
			'ID': ID
		}, function(data) {
			alert(data)
			location.reload()
		})
	}
</script>
<?php
	
    require_once($baseUrl.'layouts/footer.php');
?>