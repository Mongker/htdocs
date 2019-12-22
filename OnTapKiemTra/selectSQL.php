<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>

    <?php 
    // Khởi tạo các biến để chuẩn bị liên kết vs SQL 
    $server='localhost';     //1
    $username='root';        //2
    $password='';            //3
    $dbname='utt';          //4
    //lien ket toi sql
    $connect=new mysqli($server, $username, $password, $dbname);
    if($connect->connect_error){
        die("Khong the ket noi".$connec->connect_error);
        exit();
    }else {
        echo 'Thanh cong' ;
    }

    //Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi


    $hoten='';
    $ngaysinh='';
    $diachi='';

    if($_SERVER['REQUEST_METHOD']==='POST'){
            if(isset($_POST['hoten'])){
                $hoten  =   $_POST['hoten'];
            }
            if(isset($_POST['ngaysinh'])){
                $ngaysinh   =   $_POST['ngaysinh'];
            }
            if(isset($_POST['diachi'])){
                $diachi =   $_POST['diachi'];
            }
    }
    
    $sql ="INSERT INTO thongtinsv ( hoten , ngaysinh , diachi) 
    VALUES (N'$hoten' , '$ngaysinh' ,N'$diachi')";

    if ($connect->query($sql) === TRUE) {
        echo "Thêm dữ liệu thành công";
    } 
    $connect->close();
    ?>


    <form action="" method="post">
        <table >
            
            <tr>
                <th>Họ tên:</th>
                <td><input type="text" name="hoten" ></td>
            </tr>
            <tr>
                <th>Ngày sinh:</th>
                <td><input type="date" name="ngaysinh" ></td>
            </tr>
            <tr>
                <th>Địa chỉ:</th>
                <td><input type="text" name="diachi" ></td>
            </tr>
            <tr>
                <th></th>
                <td><button type="submit">Thêm</button></td>
            </tr>
        </table>
    </form>
    <!-- Xóa trong SQL -->
<form action="" method="post">
    <br>
    <br>
    <table border="1px" align="center">
    	<tr>
    		
    		<td bgcolor="#E6E6FA">hoten</td>
    		<td bgcolor="#E6E6FA">ngaysinh</td>
    		<td bgcolor="#E6E6FA">diachi</td>
    		<td bgcolor="#E6E6FA">Edit</td>
    		<td bgcolor="#E6E6FA">Delete</td>
    	</tr>
<?php
    $username = "root"; // Khai báo username
    $password = "";      // Khai báo password
    $server   = "localhost";   // Khai báo server
    $dbname   = "utt";      // Khai báo database
    // Kết nối database tintuc
    $connect = mysqli_connect($server, $username, $password, $dbname);
    //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
    if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    //Code xử lý, insert dữ liệu vào table
    $sql = "SELECT * FROM thongtinsv";
    $kq=mysqli_query($connect,$sql);

   if (mysqli_num_rows($kq)>0) {
    	while ($row=mysqli_fetch_array($kq)) {
    		$id=$row['masv'];
            echo "<tr>";
	           echo "<td>".$row['hoten']."</td>";
               echo "<td>".$row['ngaysinh']."</td>";
               echo "<td>".$row['diachi']."</td>";
               echo "<td><a href='update.php?id=".$id."'><img src='../image/200x200.png'></a></td>";
	           echo "<td><a href='delete.php?id=".$id."'><img src='../image/200x200.png></a></td>";
            echo "</tr>";
    	}
 }
    else {
        echo "Không có bản ghi nào";
    }
}

//Đóng database
mysqli_close($connect);
?>

    	
    </table>
</form>
</body>
</html>
