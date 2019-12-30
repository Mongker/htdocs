<?php
$id=$_GET['id'];
//kết nối cơ sở dữ liệu
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "K3Office";      // Khai báo database     // Khai báo database
$conn=mysqli_connect($server,$username,$password,$dbname) or die('không kết nối được database');
$sql="SELECT * From K3OfficeExcel Where id='$id'";
$kq=mysqli_query($conn,$sql);
$ar=mysqli_fetch_array($kq);
?>

