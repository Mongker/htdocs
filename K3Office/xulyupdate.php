<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0.5 url=http://localhost/K3Office/test1.php" >
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
$dbname   = "K3Office";      // Khai báo database
$conn=mysqli_connect($server,$username,$password,$dbname) or die('không kết nối được database');
$sql="UPDATE K3OfficeExcel SET hoten='$hoten', ngaysinh='$ngaysinh', gioitinh='$gioitinh', diachi='$diachi' Where id='$id'";
if ($kq) {
    header("http://localhost/K3Office/test1.php");
}
?>
</body>
</html>
