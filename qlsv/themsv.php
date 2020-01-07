<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>THÊM MỚI SINH VIÊN</title>
</head>
<body>
	<?php 
		$conn = new mysqli("localhost","root","","qlsv");
		  if ($conn-> connect_error) {
		  	die("connection failed".$conn-> connect_error);
		  }
		  //file ảnh		
		$sql_insert="INSERT INTO sinhvien VALUES( null,'".$hoten."','".$lop.$id=$sinhvien.$danhmucidlop."','".$ngaysinh."','".$gioitinh."','".$khoa.$id=$sinhvien.$danhmucidkhoa."','".$anh."','".$diachi."','".$sdt."','".$email."')" ;
		if(  $hoten!='' && $ngaysinh!=''){
			$conn->query($sql_insert);
			echo '<script type="text/javascript">alert("Thêm mới thành công!");</script>';
		}else{
			echo '<script type="text/javascript">alert("Vui lòng nhập đầy đủ thông tin!");</script>';
		}
		$conn->close();
	?>
	<form action="uploadanh.php" method="post" enctype="multipart/form-data">
        <table>
        	<td>
    		<input type="file" name="fileToUpload" id="fileToUpload"></td>
    		<td><input type="submit" value="Upload Image" name="submit"></td>
    	</table>
    </form>

	<form  action="" method="post"  >
		<table>
		
			<tr>
				<td>Họ tên :</td>
				<td><input type="text" name="hoten"></td>
			</tr>
			<tr>
				<td>Lớp</td>
				<td>
					<input type="text" name="lop">
			   </td>
			</tr>
			<tr>
				<td>Ngày sinh</td>
				<td><input type="date" name="ngaysinh"></td>
			</tr>
			<tr>
				<td>Giới tính :</td>
				<td><input type="radio" name="gioitinh" value="Nam">Nam</td>
				<td><input type="radio" name="gioitinh" value="Nữ">Nữ</td>
			</tr>
			<tr>
				<td>Khoa :</td>
				<td><input type="text" name="khoa"></td>
			</tr>
			<!-- <tr>
				<td>Ảnh:</td>
				<td><input type="file" name="fileToUpload" id="fileToUpload">
                </td>
			</tr> -->
			<tr>
				<td>Địa chỉ :</td>
				<td><textarea name="diachi" value='Đại chỉ'></textarea></td>
			</tr>
			<tr>
				<td>Số điện thoại :</td>
				<td><input type="text" name="sdt"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td><input type="submit" name="themoi" value="Thêm mới"></td>
				<td><input type="reset" name="nhaplai" value="Reset"></td>
				<td><a href="select.php">Xem danh sách </a></td>
			</tr>
		</table>
		
	</form>

</body>
</html>