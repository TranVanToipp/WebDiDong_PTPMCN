<?php
	include_once ("../check_adm.php");
?>
<?php   
    $title = " Thêm";
    $baseUrl = '../';
    require_once('../layouts/header.php');
	
	include_once('../../PHPREST/core/initialize.php');
?>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	<script src="../../ckfinder/ckfinder.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<?php
	if(!empty($_POST)){
		$d_name = $_POST['Name'];
		
		$product_type = new product_type($db);
		
		$product_type->name			= $d_name;
		
		$product_type->create();
		header("location:index.php");
	}
?>
<html>
<body>
<div class="row">
	<div class="col-md-12" style="margin: 30px 0;">
		<h3>Thêm</h3>
        <div class="panel panel-primary">
            <div class="panel-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">tên loại sản phẩm:</label>
                        <input type="text" required="true" class="form-control" name="Name" placeholder="Nhập tên loại" value="">
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
