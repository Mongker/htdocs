<!DOCTYPE html>
<html>
    <head>
        <title>Thêm sản phẩm</title>
        <meta charset="UTF-8">
       
       
    </head>
    <body>
        
           <form method="post" action="../Model/xulyhoadon.php">
            <table align="center">
                <tr>
                    <td style="text-align: center;">
                        <h1>THÊM SẢN PHẨM </h1>
                        
                    </td>
                </tr>
                <tr>
                    <td>MÃ sản phẩm:</td>
                    <td><input type="text" name="masanpham" ></td>
                </tr>
                <tr>
                    <td>Tên sản phẩm:</td>
                    <td><input type="text" name="tensanpham"></td>
                </tr>
                <tr>
                    <td>Đơn giá:</td>
                    <td><input type="text" name="dongia"></td>
                </tr>
                <tr>
                    <td>Số lượng:</td>
                    <td><input type="text" name="soluong"></td>
                </tr>
                <tr>
                    <td>Số hóa đơn:</td>
                    <td><input type="text" name="sohoadon"></td>
                </tr>
                <tr>
                     <td style="text-align: center;"><br><input type="submit" name="btn_themsanpham" value="Thêm sản phẩm mới"></td>
                     
                </tr>

            </table>
            <br>
            <br>
            <?php include_once('../View/sanpham_list_view.php'); ?>
        </form>
    </body>
</html>