<!DOCTYPE html>
<html>
    <head>
        <title>Thêm hóa đơn</title>
        <meta charset="UTF-8">
       
       
    </head>
    <body>
        
           <form method="post" action="../Model/xulyhoadon.php">

            <table align="center">
                <tr>
                    <td style="text-align: center;">
                        <h1>THÊM HÓA ĐƠN </h1>
                        
                    </td>
                </tr>
                <tr>
                    <td>Số Hóa Đơn:</td>
                    <td><input type="text" name="sohoadon" ></td>
                </tr>
                <tr>
                    <td>Ngày Lập HD:</td>
                    <td><input type="date" name="ngay"></td>
                </tr>
                <tr>
                    <td>Mã Khách Hàng:</td>
                    <td><input type="text" name="makhachhang"></td>
                </tr>
                <tr>
                    <td>Mã Nhân Viên:</td>
                    <td><input type="text" name="manhanvien"></td>
                </tr>
                <tr>
                    <td>Mã Sản Phẩm:</td>
                    <td><input type="text" name="masanpham"></td>
                </tr>
                <tr>
                     <td style="text-align: center;"><br><input type="submit" name="btn_themhoadon" value="Thêm Hóa Đơn"></td>
                     
                </tr>

            </table>
            <br>
            <br>
            <?php include_once('../View/hoadon_list_view.php'); ?>

        </form>
        <form method="" action="../QLBH_view.php"><input type="submit" name="btn_thoat" value="<Quay lại"></form>
    </body>
</html>