<?php
	include_once ("../check_adm.php");
?>
<?php
    $title = 'Quản lý người dùng';
    $baseUrl = '../';
    require_once($baseUrl.'layouts/header.php');
?>
<style> 
	.nav-item:nth-child(7) {
		background-color: #c1c1c1;
	}
</style>
    <div class="row">
        <div class="tcol-md-12 table-responsive" style="margin-top: 30px;">
            <h3>Quản lí người dùng</h3>
            <table class="table table-bordered table-hover" style="margin-top: 15px;">
                <!-- <thead> -->
                    <tr>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Vai Trò</th>
						<th>Ngày tạo tài khoản</th>
						<th style="width: 50px;">Tùy chỉnh</th>
						<th style="width: 50px;">Tùy chỉnh</th>
                    </tr>
                <!-- </thead> -->
                <!-- <tbody> -->
<?php
    $url = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/user/read_user.php";
    $json=file_get_contents($url);
    $data = json_decode($json);

    foreach($data -> data as $item) {
        echo '<tr>
                <td>'.$item->id.'</td>
                <td>'.$item->fullname.'</td>
                <td>'.$item->address.'</td>
                <td>'.$item->phone_number.'</td>
                <td>'.$item->email.'</td>
                <td>'.$item->role.'</td>
				<td>'.$item->created_at.'</td>
                <th style="width: 40px; height:40px;" >
                    <button class="btn btn-warning" onclick=\'window.open("editor.php?id='.$item->id.'","_self")\'>Edit</button></a>
                </th>
                <th style="width: 50px;" >
                        <button class="btn btn-danger" onclick="deleteUser('.$item->id.')" >Xóa</button>
                </th>
            </tr>';
        }
    ?>
                <!-- </tbody> -->
            </table>
        </div>
    </div>
	<script>
        function deleteUser(ID) {
                option = confirm('Bạn có muốn xoá người dùng này không!');
                if(!option) {
                    return;
                }
                $.post('../../PHPREST/api/user/delete_user.php', {
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
<!-- onclick="deleteUser('.$item['ID'].')" -->