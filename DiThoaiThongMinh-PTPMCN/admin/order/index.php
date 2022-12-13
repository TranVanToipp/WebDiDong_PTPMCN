<?php
	include_once ("../check_adm.php");
?>
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
<?php
if (isset($_POST['xem'])){
	$hd=$_POST['hoadon'];
	if($hd=="1"){
		view();
	}
	else
		if($hd=="2"){
			$tt="1";
			view1($tt);
		}
	else
		if($hd=="3"){
			$tt="2";
			view1($tt);
		}
	else{
		$tt="3";
		view1($tt);
	}
}
else {
	view();
}
?>
            </table>
        </div>
    </div>
	
</body>
</html>

<?php
function view(){
	$url = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/orders/select_order_All.php';
	$json = file_get_contents($url);
	$data = json_decode($json);
	$index = 1;
	if(isset($data->data)){
		echo '
			<tr>
				<th>STT</th>
				<th>Mã HĐ</th>
				<th>Tên SP</th>
				<th>Tên khách hàng</th>
				<th>Số Lượng</th>
				<th>Thành Tiền</th>
				<th>Địa chỉ</th>
				<th>Trạng Thái</th>
				<th>Ngày đặt hàng</th>
				<th style="width: 50px;">Tùy chỉnh</th>
				<th style="width: 50px;">Tùy chỉnh</th>
			</tr>';
		foreach($data->data as $item){
			echo 
			'<tr>
				<td>'.($index++).'</td>
				<td>'.$item->maHD.'</td>
				<td>'.$item->name_product.'</td>
				<td>'.$item->user_name.'</td>
				<td>'.$item->num.'</td>
				<td>'.$item->money.'</td>
				<td>'.$item->tinh_tp.'-'.$item->quan_huyen.'-'.$item->xa_phuong.'-'.$item->note.'</td>
				<td>'.$item->status.'</td>
				<td>'.$item->created_at.'</td>
				<th style="width: 40px; height:40px;" >
					<button class="btn btn-warning" onclick="approveOrder('.$item->id.')">Duyệt Đơn</button></a>
				</th>
				<th style="width: 50px;" >
					<button class="btn btn-danger" onclick="cancelOrder('.$item->id.')">Hủy Đơn</button>
				</th>>
			</tr>';
		}
	}
	else
		echo '<tr>Hiện Tại không có hóa đơn nào</tr>';
}
function view1($tt){
	$url = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/orders/select_order_All_TT.php?status='.$tt;
	$json = file_get_contents($url);
	$data = json_decode($json);
	$index = 1;
	if(isset($data->data)){
		echo '
			<tr>
				<th>STT</th>
				<th>Mã HĐ</th>
				<th>Tên SP</th>
				<th>Tên khách hàng</th>
				<th>Số Lượng</th>
				<th>Thành Tiền</th>
				<th>Địa chỉ</th>
				<th>Trạng Thái</th>
				<th>Ngày đặt hàng</th>
				<th style="width: 50px;">Tùy chỉnh</th>
				<th style="width: 50px;">Tùy chỉnh</th>
			</tr>';
		foreach($data->data as $item){
			echo 
			'<tr>
				<td>'.($index++).'</td>
				<td>'.$item->maHD.'</td>
				<td>'.$item->name_product.'</td>
				<td>'.$item->user_name.'</td>
				<td>'.$item->num.'</td>
				<td>'.$item->money.'</td>
				<td>'.$item->tinh_tp.'-'.$item->quan_huyen.'-'.$item->xa_phuong.'-'.$item->note.'</td>
				<td>'.$item->status.'</td>
				<td>'.$item->created_at.'</td>
				<th style="width: 40px; height:40px;" >
					<button class="btn btn-warning" onclick="approveOrder('.$item->id.')">Duyệt Đơn</button></a>
				</th>
				<th style="width: 50px;" >
					<button class="btn btn-danger" onclick="cancelOrder('.$item->id.')">Hủy Đơn</button>
				</th>
			</tr>';
		}
	}else
		echo '<tr>Hiện Tại không có hóa đơn nào</tr>';
}

?>


<script>
	function deleteOrder(ID) {
		option = confirm('Bạn có muốn xoá Hóa Đơn này không');
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
	function approveOrder(ID) {
		option = confirm('Bạn có muốn Duyệt Hóa Đơn này không');
		if(!option) {
			return;
		}
		$.post('process_approve.php', {
			'ID': ID
		}, function(data) {
			alert(data)
			location.reload()
		})
	}
	function cancelOrder(ID) {
		option = confirm('Bạn có muốn xoá Hóa Đơn này không');
		if(!option) {
			return;
		}
		$.post('process_cancel.php', {
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
	