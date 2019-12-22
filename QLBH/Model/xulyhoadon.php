<?php
	include_once('../Publish/connect.php');
	$sohoadon=$_POST['sohoadon'];
	$ngay=$_POST['ngay'];
	$makhachhang=$_POST['makhachhang'];
	$manhanvien=$_POST['manhanvien'];
	$masanpham=$_POST['masanpham'];
	//$conn=mysqli_connect('localhost','root','','Qlsinhvien') or die('Không kết nối được DB');
	$sql="INSERT INTO hoadon (sohoadon,ngay,makhachhang,manhanvien,masanpham) VALUES('$sohoadon','$ngay','$makhachhang','$manhanvien','$masanpham')";
	$kq=mysqli_query($conn,$sql);
	if ($kq) {
		include_once('../Controller/add_hoadon.php');
	}
?>