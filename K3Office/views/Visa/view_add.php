<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php require('../style/boostrap4_1.html')?>
    <link rel="stylesheet" href="../style/view_insert.css">
    <title>Thêm hóa đơn</title>

</head>
<body>
<div class="container">
    <div align="center">
        <h1 style="text-align: center; color: red" class="textNhapNhay">Thêm một hoán đơn</h1>
    </div>
    <?php require('../../models/Visa/data_insert.php') ?>
    <div align="center">
        <form action="" method="post" enctype="multipart/form-data" >
            <table>
                <tr >
                    <td><h3 class="text">Đầu thẻ của chủ:</h3></td>
                    <td><input type="text" name="dauthe"></td>
                </tr>
                <tr >
                    <td><h3 class="text">Ngày làm thẻ:</h3></td>
                    <td><input type="date" name="ngaylam"></td>
                </tr>
                <tr >
                    <td><h3 class="text">Tên khách hàng:</h3></td>
                    <td><input type="text" name="khachhang"></td>
                </tr>
                <tr >
                    <td><h3 class="text">Số thẻ khách hàng:</h3></td>
                    <td><input type="number" name="sothe"></td>
                </tr>
                <tr >
                    <td><h3 class="text">Số tiền làm:</h3></td>
                    <td><input type="number" name="sotienlam"></td>
                </tr>
                <tr >
                    <td><h3 class="text">Phí % ngân hàng thu:</h3></td>
                    <td><input type="text" name="nht"></td>
<!--                    pattern="[0-9]+([,\.][0-9]+)?"-->
                </tr>
                <tr >
                    <td><h3 class="text">Phí % thu khách hàng:</h3></td>
                    <td><input type="text" name="kh"</td>
                </tr>

                <tr>
                    <td><input type="submit" name="them" value="Thêm mới"></td>
                    <td><input type="reset" name="nhaplai" value="Reset"></td>
                    <td><a href="test1.php">Xem danh sách</a></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php require('../style/boostrap4_2.html') ?>
</body>
</html>
