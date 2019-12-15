<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form>
	 <table border="1" align="center">
		<?php
		   //kết nối với CSDL
		   
		    $username = "root"; // Khai báo username
			$password = "";      // Khai báo password
			$server   = "localhost";   // Khai báo server
			$dbname   = "web";      // Khai báo database
			$id=(isset($_GET['id']))?$_GET['id']:0;


			// Create connection
			$conn = mysqli_connect($server, $username, $password,$dbname );
			// Check connection
			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}
				
			

			
			// if (mysqli_query($conn, $sql)) {
			//     echo "Record updated successfully";
			// } else {
			//     echo "Error updating record: " . mysqli_error($conn);
			// }
            
			
				// tạo câu truy vấn để sửa dữ iệu
			
			

			$sql_delete="";
			$sql_delete="DELETE FROM ttdk WHERE id= ".$id;
			if (mysqli_query($conn, $sql_delete)) {
		    // echo "Record deleted successfully";
			} else {
			    echo "Error deleting record: " . mysqli_error($conn);
			}							
			
			$sql = "SELECT *FROM ttdk";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    ?>
			    <h1 align="CENTER" style="font-size: 25px" style="color: red"> DANH SÁCH SINH VIÊN</h1>
			    <tr>
			    	<th>Họ Tên</th>
			    	<th>Mật khẩu</th>
			    	<th>Giới tính</th>
			    	<th>Ngày sinh</th>
			    	<th>Sở thích</th>
			    	<th>Ảnh</th>
			    </tr>
                <?php  
			    while($row = mysqli_fetch_assoc($result)) {

			    	?>
			    
		    	<tr>
		    		<td><?= $row["username"] ?></td>
		    	    <td><?= $row["password"] ?></td>
		    		<td><?= $row["sex"] ?></td>
		    		<td><?= $row["birthday"] ?></td>
		    		<td><?= $row["hobby"] ?></td>
		    		<td><img src="<?= $row["avarta"] ?>" alt="" width= "50px" height="50px"></td>
		    		<td><a href="update.php?id=<?= $row["id"]  ?>">Sửa</a><a href="select.php?id=<?= $row["id"] ?>">Xoá</a><a href="form.php?id=<?= $row['id'] ?>">Thêm</a></td>;
		    	</tr>
		    	<?php
			       // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			    }
			} else {
			    echo "0 results";
			}

			mysqli_close($conn);
		?>
    
	</table>
	</form>
</body>
</html>