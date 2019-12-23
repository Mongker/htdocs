<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="0.2 url=<?php echo base_url() ?>../LO2-test1/test1.php" >
    <title>Document</title>
</head>
<body>
<?php
$id=$_POST['id'];
$hoten= $_POST['hoten'];
$ngaysinh = $_POST['ngaysinh'];
$gioitinh =$_POST['gioitinh'];
//kết nối DB
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "LO2-test1";      // Khai báo database
$conn=mysqli_connect($server,$username,$password,$dbname) or die('không kết nối được database');
$sql="UPDATE test1 SET hoten='$hoten', ngaysinh='$ngaysinh', gioitinh='$gioitinh'Where id='$id'";
$kq=mysqli_query($conn,$sql);
if ($kq) {
//    header("./Test1.php");
}
?>
</body>
</html>


?>

