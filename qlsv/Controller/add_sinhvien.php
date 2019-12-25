<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <div class="all" align="center">
        <form action="../model/xulyadd_sinhvien.php" method="post">
            <h2>THÊM SINH VIÊN</h2>
            <table>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoten" id=""></td>
            </tr>
            <tr>
                <td >Lớp:</td>
                    <td >
                        <select name="malop" style="width: 100%">
                            <?php
                                include_once('../Publish/connect.php');
                                $sql="SELECT * FROM lophoc";
                                $kq=mysqli_query($conn,$sql);
                                while ($row=mysqli_fetch_array($kq)) {
                                    echo "<option value=".$row['malop'].">".$row['malop']." - ".$row['tenlop']."</option>";
                                }
                            ?>
                        </select>
                    </td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="ngaysinh" id=""></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td><input type="radio" name="gioitinh" id="" value="Nam" checked=""> Nam
                    <input type="radio" name="gioitinh" id="" value="Nu"> Nữ</td>
            </tr>
            <tr>
                <td><input type="reset"></td>
                <td><input type="submit" name="" id="" value="ADDDDDD"></td>
            </tr>
            </table>
        </form>
    </div>
</body>
</html>