<?php
	include_once('../Publish/connect.php');
	$masanpham=$_POST['masanpham'];
	$tensanpham=$_POST['tensanpham'];
	$dongia=$_POST['dongia'];
	$soluong=$_POST['soluong'];
	$sohoadon=$_POST['sohoadon'];
	//$conn=mysqli_connect('localhost','root','','Qlsinhvien') or die('Không kết nối được DB');
	$sql="INSERT INTO sanpham (masanpham,tensanpham,dongia,soluong,sohoadon) VALUES('$masanpham','$tensanpham','$dongia','$soluong','sohoadon')";
	$kq=mysqli_query($conn,$sql);
	if ($kq) {
		include_once('../Controller/add_sanpham.php');
	}
?>