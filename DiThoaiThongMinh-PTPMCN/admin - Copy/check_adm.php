<?php
session_start(); 
if(isset($_SESSION['role_id'])){
	if($_SESSION['role_id'] == 1);
	else header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN');
}else header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/login');
?>