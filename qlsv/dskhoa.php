<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HIỂN THỊ DANH SÁCH KHOA</title>
</head>
<body>
	<form method="post" action="timkiemkhoa.php">
	<table border="1" align="center">
	<?php 
	  $id=(isset($_GET['id']))? $_GET['id']:0;
	  $conn = new mysqli("localhost","root","","qlsv");
	  if ($conn-> connect_error) {
	  	die("connection failed".$conn-> connect_error);
	  }
	  // echo "Connect sucessfuly"
	  	$sql_delete="";
		$sql_delete = "DELETE FROM khoa WHERE id= ".$id;
		// echo $sql_delete;
			if ($conn->query($sql_delete) === TRUE) {
				// echo '<script type="text/javascript">alert("Bạn có chắc chắn muốn xóa ?")</script>';
			    
		} else {
		    echo "Error deleting record: " . $conn->error;
		}
	  $sql="SELECT *FROM khoa ";
	  $result=$conn->query($sql);
	  if ($result->num_rows >0) {
	  	$i=1;
	  
	 ?>
	   
	   <tr><td colspan="6" align="center"><h2>DANH SÁCH KHOA</h2></td></tr>
	   <tr><td colspan="6"><a href="themkhoa.php">Thêm mới</a><br><a href="timkiemkhoa.php">Tìm kiếm</a></td></tr>
	   <tr>
	   	<th>STT</th>
	   	<th>Khoa</th>
	   	<th>Chức năng</th>
	   </tr>
	   <?php 
	   while ($row =$result->fetch_assoc()) {
	        
	     ?>
      	<tr>
	      	<?php echo '<td>'.$i.'</td>'; ?>
	      	<td><?= $row['khoa'] ?></td>
	      	<td>
	      		<a href="dskhoa.php?id=<?=$row["id"] ?>">Xóa</a>
	      		<a href="suakhoa.php?id=<?=$row["id"] ?>">Sửa</a>
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