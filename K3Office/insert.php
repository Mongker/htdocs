<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm mới sinh viên</title>
</head>
<body>
    <?php require('./models/data_insert.php') ?>
     <form action="" method="post" enctype="multipart/form-data">
         <table>
             <tr>
                 <td>Họ tên :</td>
                 <td><input type="text" name="hoten"></td>
             </tr>
             <tr>
                 <td>Ngày sinh :</td>
                 <td><input type="date" name="ngaysinh"></td>
             </tr>
             <tr>
                 <td>Giới tính</td>
                 <td>
                    <input type="radio" name="gioitinh" value="Nữ">Nữ
                    <input type="radio" name="gioitinh" value="Nam">Nam
                </td>
             </tr>
             <tr>
                 <td>Địa chỉ:</td>
                 <td><textarea name="diachi" style="width: 200px; height: 50px"></textarea></td>
             </tr>
             <tr>
                 <td><input type="submit" name="them" value="Thêm mới"></td>
                 <td><input type="reset" name="nhaplai" value="Reset"></td>
                 <td><a href="test1.php">Xem danh sách</a></td>
             </tr>
         </table>
     </form>
</body>
</html>
