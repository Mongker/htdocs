<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hiển thị danh sách</title>
</head>
<body>
	<form method="post" action="" >
		 <table border="1" align="center" >

	<?php 
	    $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "qlsv";
		$id=(isset($_GET['id']))?$_GET['id']:0;

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
	  // echo "Connected successfully";
		$sql_delete="";
	    $sql_delete = "DELETE FROM sinhvien WHERE id= ".$id;
	    
		if ($conn->query($sql_delete) === TRUE) {
			// echo '<script type="text/javascript">alert("Bạn có chắc chắn muốn xóa ?")</script>';
		    
		} else {
		    echo "Error deleting record: " . $conn->error;
		}
		//insert
		 $sql=" SELECT lop,hoten,ngaysinh,gioitinh FROM sinhvien,lop WHERE sinhvien.danhmucidlop=lop.id";
	     $result = $conn->query($sql);
	 
      if ($result->num_rows > 0) {
	 	 $i=1;
	 	 ?>
	 	  
		 		<tr><td colspan="6" align="center"> <input type="text" name="timkiem">
		 			<input type="submit" name="search" value="Search"></td>
		 		</tr>
		 		<tr><td colspan="6" align="center"><h1>Tổng số sinh viên</h1></td></tr>
		 		<tr><td colspan="6"><a href="insert.php">Thêm mới</a></td></tr> 
		 		<tr>
		 			<th>STT</th>
		 			<th>Lớp</th>
		 			<th>Họ tên</th>
		 			<th>Ngày sinh</th>
		 			<th>Giới tính</th>
		 			<th>Chức năng</th>
		 		</tr>

		 		
	 <?php 
	    while($row = $result->fetch_assoc()) {
	    	
	    	?>

		 		 <tr>
		    		    <?php echo '<td>'.$i.'</td>';
		    		     ?>

		    		    <td><?= $row["lop"] ?></td>
			    		<td><?= $row["hoten"] ?></td>
			    	    <td><?= $row["ngaysinh"] ?></td>
			    		<td><?= $row["gioitinh"] ?></td>
			    		
			    		<td>
			    			<a href="select1.php?id=<?= $row["id"] ?>">Xoá</a>
			    			<a href=" update.php?id=<?= $row["id"] ?>">Sửa</a>
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
 	</table>
</form>

</body>
</html>
