<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>THÊM MỚI KHOA</title>
</head>
<body>
	<?php 
		// $id=(isset($_GET['id']))?$_GET['id']:0;
        $khoa=(isset($_POST['khoa']))? $_POST['khoa'] :"";
        
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
        $sql_insert="insert into khoa values(null,'".$khoa."') ";
            if ($khoa!=''  ) {
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
				<td>Khoa :</td>
				<td><input type="text" name="khoa"></td>
			</tr>		
			<tr>
				<td><input type="submit" name="themmoi" value="Thêm mới"></td>
				<td><input type="reset" name="nhaplai" value="Reset"></td>
				<td><a href="dskhoa.php">Xem danh sách </a></td>
			</tr>
		</table>
	</form>

</body>
</html>