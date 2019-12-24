<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<meta http-equiv="refresh" content="0.5 url=http://localhost/qlsv/View/Sinhvien_list_view.php" >
	<title></title>
</head>
<body>
	<?php 
	include_once('../Publish/connect.php');
	$id = $_POST['id'];
	$hoten=$_POST['hoten'];
	$ngaysinh=$_POST['ngaysinh'];
	$gioitinh=$_POST['gioitinh'];
	$malop=$_POST['malop'];
	$sql="UPDATE sinhvien SET hoten='$hoten', ngaysinh='$ngaysinh',malop='$malop',gioitinh='$gioitinh'
	 Where id= '$id' ";
			$kq=mysqli_query($conn,$sql);
	if ($kq) {
	
	}

	header("http://localhost/qlsv/View/Sinhvien_list_view.php");

	 ?>
	
</body>
</html>