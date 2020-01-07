<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HIỂN THỊ DANH SÁCH SINH VIÊN</title>
</head>
<body>
	<form method="post" action="">
	<table border="1" align="center">
	<?php 
	  $id=(isset($_GET['id']))? $_GET['id']:0;
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
	  $sql="SELECT lop,khoa,hoten,ngaysinh,gioitinh,anh,diachi,sodt,email FROM sinhvien,lop,khoa WHERE sinhvien.danhmucidlop=lop.id and sinhvien.danhmucidkhoa=khoa.id";
	  $result=$conn->query($sql);
	  if ($result->num_rows >0) {
	  	$i=1;
     
	 ?>
	   <tr><td colspan="11" align="center"><input type="text" name="timkiem"><input type="submit" name="search" value="search"></td></tr>
	   <tr><td colspan="11" align="center"><h1>Tổng số sinh viên</h1></td></tr>
	   <tr><td colspan="11"><a href="themsv.php">Thêm mới</a></td></tr>
	   <tr>
	   	<th>STT</th>
	   	<th>Lớp</th>
	   	<th>Khoa</th>
	   	<th>Họ tên</th>
	   	<th>Ngày sinh</th>
	   	<th>Giới tính</th>
	   	<th>Ảnh</th>
	   	<th>Địa chỉ</th>
	   	<th>Số đt</th>
	   	<th>Email</th>
	   	<th>Chức năng</th>
	   </tr>
	   <?php 
	   while ($row =$result->fetch_assoc()) {
	        
	     ?>
      	<tr>
	      	<?php echo '<td>'.$i.'</td>'; ?>
	      	<td><?= $row['lop'] ?></td>
	      	<td><?= $row['khoa'] ?></td>
	      	<td><?= $row['hoten'] ?></td>
	      	<td><?= $row['ngaysinh'] ?></td>
	      	<td><?= $row['gioitinh'] ?></td>
	      	<td><img src="<?= $row["avarta"] ?>" alt="" width= "50px" height="50px"></td>
	      	<td><?= $row['diachi'] ?></td>
	      	<td><?= $row['sodt'] ?></td>
	      	<td><?= $row['email'] ?></td>
	      	<td>
	      		<a href="select.php?id=<?=$row["id"] ?>">Xóa</a>
	      		<a href="select.php?id=<?=$row["id"] ?>">Sửa</a>
	      	</td>
	      	<?php $i++; ?>
      	</tr>
      	<?php 
      	}
      	echo '</table>';
      }else{
      	echo '0 results';}
      	$conn->close();
      	 ?>
      </table>
</form>
</body>
</html>