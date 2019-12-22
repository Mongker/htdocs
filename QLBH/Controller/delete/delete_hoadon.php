<?php

	$conn=mysqli_connect('localhost','root','','qlbh_mt') or die('Không kết nối được DB');
	$lang=mysqli_query($conn,"SET NAMES 'utf8'");
	$sohoadon=$_POST ['sohoadon'];
	$sql="DELETE FROM hoadon WHERE sohoadon = '$sohoadon'";
	$kq=mysqli_query($conn,$sql);
	
?>
