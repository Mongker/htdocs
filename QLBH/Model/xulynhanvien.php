<?php
	include_once('../Publish/connect.php');
	$manhanvien=$_POST['manhanvien'];
	$hoten=$_POST['hoten'];
	$gioitinh=$_POST['gioitinh'];
	$diachi=$_POST['diachi'];
	$namsinh=$_POST['namsinh'];
	$sodienthoai=$_POST['sodienthoai'];
	$luong=$_POST['luong'];
	$sql="INSERT INTO nhanvien (manhanvien,hoten,gioitinh,diachi,namsinh,sodienthoai,luong)  VALUES ('$manhanvien','$hoten','$gioitinh','$diachi','$namsinh','$sodienthoai','$luong')";
	$kq=mysqli_query($conn,$sql);
	if ($kq) {
		include_once('../Controller/add_nhanvien.php');
	}
	
?>