<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh sách sinh viên</title>
</head>
<body>

	<a href="insert.php">Thêm mới sinh viên</a><br>
	<a href="search.php">Tìm kiếm sinh viên</a>
	<?php 
	 //kết nối database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "LO2-test1";
		$id=(isset($_GET['id']))?$_GET['id']:0;

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
	// echo "Connected successfully";
	//xóa
	$sql_delete="";
	$sql_delete = "DELETE FROM test1 WHERE id= ".$id;

		if ($conn->query($sql_delete) === TRUE) {
			// echo '<script type="text/javascript">alert("Bạn có chắc chắn muốn xóa ?")</script>';
		    
		} else {
		    echo "Error deleting record: " . $conn->error;
		}

	//select duwxx liệu từ database ra màn hình
	$sql="SELECT*FROM test1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<h1>DANH SÁCH SINH VIÊN</h1>';
	    echo "<table border='1' ><tr><th>STT</th><th>Họ Tên</th><th>Ngày sinh</th><th>Giới tính</th><th>Địa chỉ</th><th>Chức năng</th></tr>";
	    // output data of each row
	    $i=1;

	    while($row = $result->fetch_assoc()) {
	    	?>
	    		    <tr>
	    		    <?php echo '<td>'.$i.'</td>'; ?>
		    		<td><?= $row["hoten"] ?></td>
		    	    <td><?= $row["ngaysinh"] ?></td>
		    		<td><?= $row["gioitinh"] ?></td>
		    		<td><?= $row["diachi"] ?></td>
		    		<td>
		    			<a href="test1.php?id=<?= $row["id"] ?>">Xoá</a>
		    			<a href="update.php?id=<?= $row["id"] ?>">Sửa</a>
	    			</td>
		    		<?php $i++; ?>

		    	</tr>
    <?php 

	    }
	    echo "</table>";
	} else {
	    echo "0 results";
	}
	$conn->close();
 	?>

	
</body>
</html>


