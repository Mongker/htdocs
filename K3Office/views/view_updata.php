<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<H3>CẬP NHẬT DỮ LIỆU</H3>
<?php require('../models/data_updata.php')?>
<form action="../models/data_updataCheck.php" method="post">
    <table>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $id ?>"></td>
        </tr>
        <tr>
            <th>Họ tên:</th>
            <td><input type="text" name="hoten" value="<?php echo $ar['hoten'] ?>"></td>
        </tr>

        <tr>
            <th>Ngày sinh:</th>
            <td><input type="date" name="ngaysinh" value="<?php echo $ar['ngaysinh'] ?>"></td>
        </tr>

        <tr>
            <th>Giới tính</th>
            <td>
                <?php
                if ($ar['gioitinh']=="Nam") {
                    ?>
                    <input type="radio" name="gioitinh" value="Nữ" >Nữ
                    <input type="radio" name="gioitinh" value="Nam" checked="">Nam

                    <?php
                }else {
                    ?>
                    <input type="radio" name="gioitinh" value="Nữ" checked="">Nữ
                    <input type="radio" name="gioitinh" value="Nam" >Nam

                    <?php
                }
                ?>
            </td>
        </tr>

        <tr>
            <th>Địa chỉ</th>
            <td><textarea style="width: 200px; height: 50px" name="diachi"><?php echo $ar['diachi'] ?></textarea></td>
        </tr>
    </table>
    <button type="submit">Sửa</button>
</form>
</body>
</html>

