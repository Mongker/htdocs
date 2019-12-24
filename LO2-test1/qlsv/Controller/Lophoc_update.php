<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <?php       
               include_once('../Publish/connect.php');
               $malop = $_GET['malop'];
               
                $sql="SELECT * From lophoc Where malop='$malop'";
                $kq=mysqli_query($conn,$sql);
                $ar=mysqli_fetch_array($kq);
     ?>
    <div class="all" align="center">
        <form action="../model/xulyupdate_lophoc.php" method="post">
            <h2>SỬA THÔNG TIN</h2>
            <table>
                <tr>
                    <input type="hidden" name="malop" id="" value="<?= $ar['malop'] ?>">
                </tr>
            <tr>
                <td>Tên lớp:</td>
                <td><input type="text" name="tenlop" id="" value="<?= $ar['tenlop'] ?>"></td>
            </tr>
            <tr>
                <td><input type="reset"></td>
                <td><input type="submit" name="" id="" value="SỬA"></td>
            </tr>
            </table>
        </form>
    </div>
</body>
</html>