<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0.5 url=<?php echo base_url() ?>/test1" >
    <title>Thêm mới</title>
</head>
<body>
<?php
$hoten=(isset($_POST['hoten']))? $_POST['hoten']:"";
$ngaysinh=(isset($_POST['ngaysinh']))? $_POST['ngaysinh']:"";
$gioitinh=(isset($_POST['gioitinh']))? $_POST['gioitinh']:"";
$diachi=(isset($_POST['diachi']))? $_POST['diachi']:"";

//kết nối database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LO2-test1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//insert database

$sql_insert = "INSERT INTO test1 VALUES (null,'".$hoten."', '".$ngaysinh."', '".$gioitinh."','".$diachi."')";
if ($hoten!='' && $ngaysinh!='' && $gioitinh!=''
) {
    $conn->query($sql_insert);
    echo '<script type="text/javascript">alert("Thêm mới thành công !")</script>';
//    header('http://http://localhost/LO2-test1/test1.php');
}else {
    echo '<script type="text/javascript">alert("Bạn phải nhập đầy đủ thông tin")</script>';
}
$conn->close();
?>
<form action="" method="post" >

    <table align="center">


        <tr>
            <th>Họ tên</th>
            <td><input type="text" name="hoten"></td>

        </tr>
        <tr>
            <th>Ngày sinh</th>
            <td><input type="date" name="ngaysinh"></td>
        </tr>
        <tr>
            <th>Giới tính</th>
            <td><input type="radio" name="gioitinh" value="Nữ">Nữ</td>
            <td><input type="radio" name="gioitinh" value="Nam">Nam</td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td><textarea style="width: 200px; height: 50px" name="diachi"></textarea></td>
        </tr>
        <tr><td><input type="submit" name="add" value="Thêm mới"></td></tr>
    </table>
</form>

</body>
</html>