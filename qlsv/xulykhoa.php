<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0.5 url=http://localhost/QLSV/dskhoa.php" >
    <title></title>
</head>
<body>
<?php
$id=$_POST['id'];
$khoa= $_POST['khoa'];
		
//kết nối DB
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "qlsv";      // Khai báo database
$conn=mysqli_connect($server,$username,$password,$dbname) or die('không kết nối được database');
$sql_update="UPDATE khoa SET khoa='$khoa' Where id='$id'";
$conn->query($sql_update);
?>
</body>
</html>
