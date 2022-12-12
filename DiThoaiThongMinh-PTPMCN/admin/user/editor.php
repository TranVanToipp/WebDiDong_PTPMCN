
<?php
	include_once ("../check_adm.php");
?>
<?php   
    $title = "Sửa người dùng";
    $baseUrl = '../';
    require_once('../layouts/header.php');
	
	include_once('../../PHPREST/core/initialize.php');
?>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	<script src="../../ckfinder/ckfinder.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<?php
	$d_nameofuser = $d_address= $d_sdt = $d_email = '';
	if(!empty($_POST)){
		$s_id = $_POST['id'];
		$d_nameofuser = $_POST['NameOfUser'];
		$d_email = $_POST['email'];
		$d_address = $_POST['Address'];
		$d_sdt = $_POST['Sdt'];
		$role = $_POST['role'];
		
		$user = new user($db);
		
		$user->id 			= $s_id;
		$user->fullname		= $d_nameofuser;
		$user->email		= $d_email;
		$user->phone_number	= $d_sdt;
		$user->address		= $d_address;
		$user->role_id		= $role;
		$user->update();
		header("location:index.php");
	}
	$id='';
	if(isset($_GET['id'])){
	$id = $_GET['id'];
	$url="http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/user/select_user.php?id=".$id;
	$json = file_get_contents($url);
	$data = json_decode($json);
	
	if(isset($data->data)){
		foreach($data->data as $user){
			$d_nameofuser = $user->fullname;
			$d_address = $user->address;
			$d_sdt = $user->phone_number;
			$d_email = $user->email;
		}
	}
	else
		$id='';
	}
?>
<html>
<body>
<div class="row">
	<div class="col-md-12" style="margin: 30px 0;">
		<h3>sửa người dùng</h3>
        <div class="panel panel-primary">
            <div class="panel-body">
                <form method="post" action="" enctype="multipart/form-data">
					<div class="form-group" style="display:none;">
						<input type="number" name="id" value="<?=$id?>"></input>
					</div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">tên khách khàng:</label>
                        <input type="text" required="true" class="form-control" name="NameOfUser" placeholder="Nhập tên khách hàng" value="<?=$d_nameofuser?>">
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">Email:</label>
                        <input type="email" required="true" class="form-control" name="email" placeholder="Nhập email" value="<?=$d_email?>">
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">Địa chỉ:</label>
                        <input class="form-control" type="text" class="form-control" name="Address"  value="<?=$d_address?>">
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Số điện thoại:</label>
                        <input class="form-control" type="text" class="form-control" name="Sdt" value="<?=$d_sdt?>">
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">Vai Trò:</label>
                        <input type="radio" name="role" value = "1" >Admin</input>
						<input type="radio" name="role" checked = "true" value = "2">User</input>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
	</div>
</div>
<script>
    // CKEDITOR.replace( 'description' );
    CKEDITOR.replace( 'description', {
        // filebrowserBrowseUrl: '';
        filebrowserBrowseUrl: '../ckfinder/ckfinder.html'
    } );
</script>
</body>
</html>