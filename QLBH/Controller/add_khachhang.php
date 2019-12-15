<!DOCTYPE html>
<html>
    <head>
        <title>Khách hàng</title>
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
        
        <form method="post" action="../Model/xulykhachhang.php">
            <table align="center">
                <tr>
                    <td colspan="4" style="text-align: center;">
                        <h1>THÊM KHÁCH HÀNG </h1>
                        
                    </td>
                </tr>
                
                <tr>
                    <td>Mã khách hàng:</td>
                    <td><input type="text" name="makhachhang"></td>
                </tr>
                <tr>
                    <td>Họ và Tên:</td>
                    <td><input type="text" name="tenkhachhang"></td>
                </tr>
                
                <tr>
                    <td>Địa Chỉ:</td>
                    <td><input type="text" name="diachi"></td>
                </tr>
               
                <tr>
                    <td>Số Điện Thoại:</td>
                    <td><input type="text" name="sodienthoai"></td>
                </tr>
                
            <td><input type="submit" name="btn_themkhachhang" value="Thêm"></td>
              
               <tr>
             <?php include_once('../View/khachhang_list_view.php'); ?> 
                </tr>
            </table>
        </form>
    </body>
</html>