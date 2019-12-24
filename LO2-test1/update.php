<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa dữ liệu</title>
</head>
<body>
	<?php 
	 //kết nối database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mai";
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$id=(isset($_GET['id']))?$_GET['id']:0;

//		$sql = "SELECT *FROM test1 where id =".$id;
	    $result = $conn->query($sql);
	    if ($result->num_rows > 0) {

	    	while($row = $result->fetch_assoc()) {
	    	?>
	    	<form action="x" method="post" enctype="multipart/form-data">
		
				<table >
					<tr>
						<th></th>
						<td> <input type="hidden" name="id" value="<?= $row['id'] ?>">
						</td>
					</tr>
					<tr>
						<th>Họ tên</th>
						<td><input type="text" name="hoten" value="<?= $row['hoten'] ?>"></td>
					</tr>

					<tr>
						<th>Ngày sinh</th>
						<td><input type="date" name="ngaysinh"value="<?= $row['ngaysinh'] ?>"></td>
					</tr>

					<tr>
						<th>Giới tính</th>
						<td><?php 
                              if ($row['gioitinh']=="Nam") {
                              ?>   
                              <input type="radio" name="gioitinh" value="Nữ" >Nữ
                              <input type="radio" name="gioitinh" value="Nam" checked="">Nam
                              
                              <?php
                              }else {
                              ?>
                              <input type="radio" name="gioitinh" value="Nữ" checked="">Nữ
                              <input type="radio" name="gioitinh" value="Nam" >Nam
                              
                              <?php 
                              }
                               ?></td>
					</tr>
					<tr>
						<th>Địa chỉ</th>
						<td><textarea style="width: 200px; height: 50px" name="diachi"><?= $row['diachi'] ?></textarea></td>
					</tr>
					<tr><td><input type="submit" name="sua" value="Sửa"></td>
					</tr>
				</table>
			</form>
	 <?php 

	    }
	    // echo "</table>";
	} else {
	    echo "0 results";
	}
	$conn->close();
 	?>
</body>
</html>