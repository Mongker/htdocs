<?php
	include_once('../Publish/connect.php');
	$makhachhang=$_POST['makhachhang'];
	$tenkhachhang=$_POST['tenkhachhang'];
	$diachi=$_POST['diachi'];
	$sodienthoai=$_POST['sodienthoai'];
	$sql="INSERT INTO khachhang (makhachhang,tenkhachhang,diachi,sodienthoai)  
		VALUES ('$makhachhang','$tenkhachhang','$diachi','$sodienthoai')";
	$kq=mysqli_query($conn,$sql);
	if ($kq) {
		include_once('../Controller/add_khachhang.php');
	}
	
?>