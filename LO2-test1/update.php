<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa dữ liệu</title>
</head>
<body>
<?php
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
?>
<?php
$id=(isset($_GET['id']))?$_GET['id']:0;
// echo 'id:'.$id;
$sql_update = "SELECT *FROM test1 where id ='".$id."'";
$result = mysqli_query($conn, $sql_update);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {

        ?>
        <form action="xulyupdate.php" method="post" enctype="multipart/form-data">
            <table >
                <tr>
                    <th></th>
                    <td> <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Họ tên</th>
                    <td><input type="text" name="hoten" value="<?= $row['hoten'] ?>"></td>
                </tr>

                <tr>
                    <th>Ngày sinh</th>
                    <td><input type="date" name="ngaysinh" value="<?= $row['ngaysinh'] ?>"></td>
                </tr>

                <tr>
                    <th>Giới tính</th>
                    <td><?php
                        if ($row['gioitinh']=="Nữ") {
                            ?>
                            <input type="radio" name="gioitinh" value="Nữ" checked="">Nữ
                            <input type="radio" name="gioitinh" value="Nam" >Nam

                            <?php
                        }else {
                            ?>
                            <input type="radio" name="gioitinh" value="Nữ" >Nữ
                            <input type="radio" name="gioitinh" value="Nam" checked="">Nam

                            <?php
                        }
                        ?></td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td><textarea style="width: 200px; height: 50px" name="diachi"><?= $row['diachi'] ?></textarea></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="sua" value="Sửa">
                    </td>
                    <td>
                        <input type="reset" name="reset" value="Reset"></td>
                    </td>
                </tr>
            </table>
        </form>
        <?php

    }
    // echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>