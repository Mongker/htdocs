<?php
	$id=$_GET['id'];
	// kết nối database
	$username = "root"; // Khai báo username
	$password = "";      // Khai báo password
	$server   = "localhost";   // Khai báo server
	$dbname   = "tintuc";      // Khai báo database     // Khai báo database
	$conn=mysqli_connect($server,$username,$password,$dbname) or die('không kết nối được database');
	$sql="Delete From thongtinsv Where id='$id'";
	$kq=mysqli_query($conn,$sql);
	if ($kq) {
		header("http://localhost/OnTapKiemTra/selectSQL.php");
	}
?>