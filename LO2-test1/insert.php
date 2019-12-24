<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm mới sinh viên</title>
</head>
<body>
    <?php 
        // $id=(isset($_GET['id']))?$_GET['id']:0;
        $hoten=(isset($_POST['hoten']))? $_POST['hoten'] :"";
        $ngaysinh=(isset($_POST['ngaysinh']))? $_POST['ngaysinh']:"";
        $gioitinh=(isset($_POST['gioitinh']))? $_POST['gioitinh']:"";
        $diachi=(isset($_POST['diachi']))? $_POST['diachi']:"";
        
    //kết nối database
        $servername= "localhost";
        $username = "root";
        $password = "";
        $dbname = "mai";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }// echo "Connected successfully";
        
        //insert dữ liệu
        $sql_insert="insert into test1 values(null,'".$hoten."','".$ngaysinh."','".$gioitinh."','".$diachi."') ";
            if ($hoten!='' && $ngaysinh!='' && $gioitinh!='' ) {
               $conn->query($sql_insert);
               echo' <script type="text/javascript">alert("Thêm mới thành công !");</script>';
            
           }else {
            echo '<script type="text/javascript">alert("Bạn phải nhập đầy đủ thông tin để thêm mới !");</script>';
            }
        $conn->close();

     ?>
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
