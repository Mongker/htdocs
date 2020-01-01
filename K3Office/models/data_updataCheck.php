<?php
$id=$_POST['id'];
$hoten= $_POST['hoten'];
$ngaysinh = $_POST['ngaysinh'];
$gioitinh =$_POST['gioitinh'];
$diachi =$_POST['diachi'];
//kết nối DB
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "K3Office";      // Khai báo database
$conn = mysqli_connect($server,$username,$password,$dbname) or die('không kết nối được database');
$sql_update ="UPDATE K3OfficeExcel SET hoten='$hoten', ngaysinh='$ngaysinh', gioitinh='$gioitinh', diachi='$diachi' Where id='$id'";
$kq = $conn->query($sql_update);
if($kq){
    require('../views/QuayLai.html');
}
$conn->close();
?>