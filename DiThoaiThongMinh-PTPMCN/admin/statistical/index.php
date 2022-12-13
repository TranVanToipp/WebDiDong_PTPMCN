<?php
	include_once ("../check_adm.php");
?>
<?php
    $title = 'Thống Kê';
    $baseUrl = '../';
    require_once($baseUrl.'layouts/header.php');
?>

<?php
	include_once('../../PHPREST/core/initialize.php');
	$orders = new orders($db);
	$result = $orders->select_orders_All();
	/**
	 * @param lấy số lượng hóa đớn
	 * dựa vào PDO
	 */
	$num_orders = $result->rowCount();
	
	$user = new user($db);
	$result = $user->read_User();
	$num_user = $result->rowCount();

?>

<?php
if(!empty($_POST)){
	if($_POST['year'] != '' && $_POST['month'] != ''){
		$chart_data_m = '';
		$sum_m = 0;
		$sum_money_m = 0;
		$url_M = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/statistical/statistical_DAY.php?year='.$_POST['year'].'&month='.$_POST['month'];
		$json_M = file_get_contents($url_M);
		$data_M = json_decode($json_M);
		if(isset($data_M->data)){
			foreach($data_M->data as $item){
				$chart_data_m .= "{ DAY:'".$item->ngay."', tongtien:".$item->tongTien."}, ";
				$sum_m +=1;
				$sum_money_m +=$item->tongTien;
			}
			
		}
		$chart_data_m = substr($chart_data_m, 0, -2);
	}else if($_POST['year'] != '' && $_POST['month'] == ''){
		$chart_data_m = '';
		$sum_m = 0;
		$sum_money_m = 0;
		$url_M = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/statistical/statistical_MONTH.php?year='.$_POST['year'];
		$json_M = file_get_contents($url_M);
		$data_M = json_decode($json_M);
		if(isset($data_M->data)){
			foreach($data_M->data as $item){
				$chart_data_m .= "{ Month:'".$item->thang."', tongtien:".$item->tongTien."}, ";
				$sum_m +=1;
				$sum_money_m +=$item->tongTien;
			}
			
		}
		$chart_data_m = substr($chart_data_m, 0, -2);
	}else if ($_POST['year'] == '' && $_POST['month'] != '') {
		$year = getdate();
		$chart_data_m = '';
		$sum_m = 0;
		$sum_money_m = 0;
		$url_M = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/statistical/statistical_DAY.php?year='.$year['year'].'&month='.$_POST['month'];
		$json_M = file_get_contents($url_M);
		$data_M = json_decode($json_M);
		if(isset($data_M->data)){
			foreach($data_M->data as $item){
				$chart_data_m .= "{ DAY:'".$item->ngay."', tongtien:".$item->tongTien."}, ";
				$sum_m +=1;
				$sum_money_m +=$item->tongTien;
			}
			
		}
		$chart_data_m = substr($chart_data_m, 0, -2);
	}
	else{
		$year = getdate();
		$chart_data_m = '';
		$sum_m = 0;
		$sum_money_m = 0;
		$url_M = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/statistical/statistical_MONTH.php?year='.$year['year'];
		$json_M = file_get_contents($url_M);
		$data_M = json_decode($json_M);
		if(isset($data_M->data)){
			foreach($data_M->data as $item){
				$chart_data_m .= "{ Month:'".$item->thang."', tongtien:".$item->tongTien."}, ";
				$sum_m +=1;
				$sum_money_m +=$item->tongTien;
			}
			
		}
		$chart_data_m = substr($chart_data_m, 0, -2);
	}
	
}
else{
	$year = getdate();
	$chart_data_m = '';
	$sum_m = 0;
	$sum_money_m = 0;
	$url_M = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/statistical/statistical_MONTH.php?year='.$year['year'];
	$json_M = file_get_contents($url_M);
	$data_M = json_decode($json_M);
	if(isset($data_M->data)){
		foreach($data_M->data as $item){
			$chart_data_m .= "{ Month:'".$item->thang."', tongtien:".$item->tongTien."}, ";
			$sum_m +=1;
			$sum_money_m +=$item->tongTien;
		}
	}
	$chart_data_m = substr($chart_data_m, 0, -2);
}
?>



<style> 
	.nav-item:nth-child(7) {
		background-color: #c1c1c1;
	}

	.container-fluid__content-top  {
      margin-top: 50px;
	}
	.column-month{
		margin-left: 20px;
		margin-top: 50px;
		font-family: cursive;
	}
</style>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
  
    <div class="row">
    <div class="container-fluid container-fluid__content-top">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $num_orders;?></h3>
                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="../order" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $num_user;?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<div>
				<select name="year" id="year" size="1"></select>
				<select name="month" id="month" size="1"></select>
				<input type="submit" name="submit" value="Xem">
			</div>
		</form>
		<body>
			<div id="chart"></div>
			<br /><br />
			<div> 
			<?php
 
			if(!empty($_POST)){
				if($_POST['year'] != '' && $_POST['month'] != '')
					echo '<h2>Tổng Tiền Trong '.$sum_m.' ngày của tháng '.$_POST['month'].'/'.$_POST['year'].' là: '.number_format($sum_money_m).'<sup>đ</sup></h2>'; 
				else if($_POST['year']== '' && $_POST['month'] == ''){
					$y = getdate();
					echo '<h2>Tổng Tiền Trong '.$sum_m.' tháng của năm '.$y['year'].' là: '.number_format($sum_money_m).'<sup>đ</sup></h2>';
				}else if($_POST['year']== '' && $_POST['month'] != ''){
					$y = getdate();
					echo '<h2>Tổng Tiền Trong '.$sum_m.' ngày của tháng '.$_POST['month'].'/'.$y['year'].' là: '.number_format($sum_money_m).'<sup>đ</sup></h2>'; 
				}
				else {
					echo '<h2>Tổng Tiền Trong '.$sum_m.' tháng của năm '.$_POST['year'].' là: '.number_format($sum_money_m).'<sup>đ</sup></h2>';
				}
			}else {
				$y = getdate();
				echo '<h2>Tổng Tiền Trong '.$sum_m.' tháng của năm '.$y['year'].' là: '.number_format($sum_money_m).'<sup>đ</sup></h2>';
			}
			?>
			</div>
			
		</body>
      </div>
	  
    </div>
<?php
	require_once($baseUrl.'layouts/footer.php');
?>


<script>
var btnXem = "<?php if(!empty($_POST)) echo 1; else echo 0;?>";
var year = "<?php if(isset($_POST['year'])) echo $_POST['year']; else echo '';?>";
var month = "<?php if(isset($_POST['month'])) echo $_POST['month']; else echo '';?>";
console.log(btnXem);
if(btnXem == 1){
	if(year != '' && month != ''){
		Morris.Bar({
		 element : 'chart',
		 data:[<?php echo $chart_data_m; ?>],
		 xkey:'DAY',
		 ykeys:['tongtien'],
		 labels:['tongtien'],
		 hideHover:'auto'
		});
	}
	else if (year == '' && month != ''){
		Morris.Bar({
		 element : 'chart',
		 data:[<?php echo $chart_data_m; ?>],
		 xkey:'DAY',
		 ykeys:['tongtien'],
		 labels:['tongtien'],
		 hideHover:'auto'
		});
	}
	else {
		Morris.Bar({
		 element : 'chart',
		 data:[<?php echo $chart_data_m; ?>],
		 xkey:'Month',
		 ykeys:['tongtien'],
		 labels:['tongtien'],
		 hideHover:'auto'
		});
	}
}else{
	Morris.Bar({
	 element : 'chart',
	 data:[<?php echo $chart_data_m; ?>],
	 xkey:'Month',
	 ykeys:['tongtien'],
	 labels:['tongtien'],
	 hideHover:'auto'
	});
}
</script>

<script>
$(function(){
//Năm tự động điền vào select
    var seYear = $('#year');
    var date = new Date();
    var cur = date.getFullYear();

    seYear.append('<option value="">-- Year --</option>');
    for (i = cur; i >= 1900; i--) {
        seYear.append('<option value="'+i+'">'+i+'</option>');
    };
    
    //Tháng tự động điền vào select
    var seMonth = $('#month');
    var date = new Date();
    
    var month=new Array();
    month[1]="January";
    month[2]="February";
    month[3]="March";
    month[4]="April";
    month[5]="May";
    month[6]="June";
    month[7]="July";
    month[8]="August";
    month[9]="September";
    month[10]="October";
    month[11]="November";
    month[12]="December";

    seMonth.append('<option value="">-- Month --</option>');
    for (i = 12; i > 0; i--) {
        seMonth.append('<option value="'+i+'">'+month[i]+'</option>');
    };
});
</script>