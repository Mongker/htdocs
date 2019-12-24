<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0.5 url=http://localhost/LO2-test1/test1.php" >
    <title></title>
</head>
<body>
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
$dbname   = "LO2-test1";      // Khai báo database
$conn=mysqli_connect($server,$username,$password,$dbname) or die('không kết nối được database');
$sql="UPDATE test1 SET hoten='$hoten', ngaysinh='$ngaysinh', gioitinh='$gioitinh', diachi='$diachi' Where id='$id'";
$kq=mysqli_query($conn,$sql);
if ($kq) {
    header("http://localhost/LO2-test1/test1.php");
}
?>
</body>
</html>