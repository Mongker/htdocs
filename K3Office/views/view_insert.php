<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php require('./style/boostrap4_1.html')?>
    <link rel="stylesheet" href="./style/view_insert.css">
    <title>Thêm mới sinh viên</title>

</head>
<body>
   <div class="container">
       <div align="center">
           <h1 style="text-align: center; color: red" class="textNhapNhay">Thêm một sinh viên</h1>
       </div>
       <?php require('../models/data_insert.php') ?>
       <div align="center">
           <form action="" method="post" enctype="multipart/form-data" >
               <table>
                   <tr >
                       <td><h3 class="text">Họ tên :</h3></td>
                       <td><input type="text" name="hoten"></td>
                   </tr>
                   <tr>
                       <td><h3 class="text"> Ngày sinh :</h3></td>
                       <td><input type="date" name="ngaysinh"></td>
                   </tr>
                   <tr>
                       <td><h3 class="text">Giới tính</h3></td>
                       <td>
                           <input type="radio" name="gioitinh" value="Nữ">Nữ
                           <input type="radio" name="gioitinh" value="Nam">Nam
                       </td>
                   </tr>
                   <tr>
                       <td><h3 class="text">Địa chỉ:</h3></td>
                       <td><textarea name="diachi" style="width: 200px; height: 50px"></textarea></td>
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
<?php require('./style/boostrap4_2.html') ?>
</body>
</html>
