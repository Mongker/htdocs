<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<H3>CẬP NHẬT DỮ LIỆU</H3>
<?php
$id=$_GET['id'];
//kết nối cơ sở dữ liệu
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "qlsv";      // Khai báo database     // Khai báo database
$conn=mysqli_connect($server,$username,$password,$dbname) or die('không kết nối được database');
$sql="SELECT * From khoa Where id='$id'";
$kq=mysqli_query($conn,$sql);
$ar=mysqli_fetch_array($kq);

?>
<form action="xulykhoa.php" method="post">
    <table>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $id ?>"></td>
        </tr>
        <tr>
            <th>Khoa:</th>
            <td><input type="text" name="khoa" value="<?php echo $ar['khoa'] ?>"></td>
        </tr>

       
    </table>
    <button type="submit">Sửa</button>
</form>
</body>
</html>
