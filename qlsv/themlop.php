<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>THÊM MỚI LỚP</title>
</head>
<body>
	<?php 
		// $id=(isset($_GET['id']))?$_GET['id']:0;
        $lop=(isset($_POST['lop']))? $_POST['lop'] :"";
        
    //kết nối database
        $servername= "localhost";
        $username = "root";
        $password = "";
        $dbname = "qlsvl02";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }// echo "Connected successfully";
        
        //insert dữ liệu
        $sql_insert="insert into lop,khoa values(null,'".$lop."','".$khoa.$id."') ";
            if ($lop!=''  ) {
               $conn->query($sql_insert);
               echo' <script type="text/javascript">alert("Thêm mới thành công !");</script>';
            
           }else {
            echo '<script type="text/javascript">alert("Bạn phải nhập đầy đủ thông tin để thêm mới !");</script>';
            }
        $conn->close();

	?>
	<form action="" method="post" >
		<table>
			<tr>
				<td>Lớp :</td>
				<td><input type="text" name="lop"></td>
			</tr>	
            <tr>
                <td>Khoa</td>
                <td><input type="text" name="khoa"></td>
            </tr>	
			<tr>
				<td><input type="submit" name="themmoi" value="Thêm mới"></td>
				<td><input type="reset" name="nhaplai" value="Reset"></td>
				<td><a href="dslop.php">Xem danh sách </a></td>
			</tr>
		</table>
	</form>

</body>
</html>