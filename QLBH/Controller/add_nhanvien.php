<!DOCTYPE html>
<html>
    <head>
        <title>Thêm nhân viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            .auto1{
                width: 20%;
                text-align: left;
            }
            .auto2{
                width: 30%;
            }
            .auto3{
                width: 80%;
            }
        </style>
    </head>
    <body>
        
        <form method="post" action="../Model/xulynhanvien.php">
            <table align="center">
                <tr>
                    <td colspan="4" style="text-align: center;">
                        <h1>THÊM MỚI NHÂN VIÊN </h1>
                        
                    </td>
                </tr>
                
                <tr>
                    <td>Mã nhân viên:</td>
                    <td><input type="text" name="manhanvien"></td>
                </tr>
                <tr>
                    <td>Họ và Tên:</td>
                    <td><input type="text" name="hoten"></td>
                </tr>
                <tr>
                    <td>Giới Tính:</td>
                    <td><input type="text" name="gioitinh"></td>
                </tr>
                <tr>
                    <td>Địa Chỉ:</td>
                    <td><input type="text" name="diachi"></td>
                </tr>
                <tr>
                    <td>Năm Sinh:</td>
                    <td><input type="date" name="namsinh"></td>
                </tr>
                <tr>
                    <td>Số Điện Thoại:</td>
                    <td><input type="text" name="sodienthoai"></td>
                </tr>
                <tr>
                    <td>Lương Cơ Bản</td>
                    <td><input type="text" name="luong"></td>
            
                </tr>
                     <td><input type="submit" name="btn_themnhanvien" value="Thêm"></td>
              
                <tr>
             <?php include_once('../View/nhanvien_list_view.php'); ?> 
                </tr>
            </table>
        </form>
    </body>
</html>