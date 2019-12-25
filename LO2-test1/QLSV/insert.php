
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm mới sinh viên</title>
</head>
<body>
    <?php 
        $id=(isset($_GET['id']))?$_GET['id']:0;
        $diachi=(isset($_POST['lop']))? $_POST['lop']:"";
        $hoten=(isset($_POST['hoten']))? $_POST['hoten'] :"";
        $ngaysinh=(isset($_POST['ngaysinh']))? $_POST['ngaysinh']:"";
        $gioitinh=(isset($_POST['gioitinh']))? $_POST['gioitinh']:"";
        
        
    //kết nối database
        $servername= "localhost";
        $username = "root";
        $password = "";
        $dbname = "qlsv";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }// echo "Connected successfully";
        
        //insert dữ liệu
        $sql_insert="insert into sinhvien values(null,'$lop','$hoten','$ngaysinh','$gioitinh') ";
        echo $sql_insert;
            if ($lop!='' && $hoten!='' && $ngaysinh!='' && $gioitinh!='' ) {
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
                <td>Lớp</td>
                <td>
                <select>
                    <option id="1">68DCHT21</option>
                    <option id="2">68DCHT22</option>
                    <option id="3">68DCHT23</option>
                    <option id="4">68DCHT24</option>
                </select>
                </td>
            </tr>
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
                 <td><input type="submit" name="them" value="Thêm mới"></td>
                 <td><input type="reset" name="nhaplai" value="Reset"></td>
                 <td><a href="select.php">Xem danh sách</a></td>
             </tr>
         </table>
     </form>

     
</body>
</html>
