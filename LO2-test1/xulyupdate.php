<?php
$id=$_POST['id'];
$hoten= $_POST['hoten'];
$ngaysinh = $_POST['ngaysinh'];
$gioitinh =$_POST['gioitinh'];
//kết nối DB
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "LO2-test1";      // Khai báo database     // Khai báo database
$conn=mysqli_connect($server,$username,$password,$dbname) or die('không kết nối được database');
$sql="UPDATE tin_xahoi SET hoten='$hoten', ngaysinh='$ngaysinh', gioitinh='$gioitinh'Where id='$id'";
$kq=mysqli_query($conn,$sql);
if ($kq) {
    header("location:../LO2-test1/Test1.php");
}

?>