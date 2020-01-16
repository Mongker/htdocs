<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HIỂN THỊ DANH SÁCH LỚP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
	<form method="post" action="xoanhieu.php">
	<table border="1" align="center"  >
	<?php 
	  // $id=(isset($_GET['id']))? $_GET['id']:0;
	  $conn = new mysqli("localhost","root","","qlsvl02");
	  if ($conn-> connect_error) {
	  	die("connection failed".$conn-> connect_error);
	  }
	  // echo "Connect sucessfuly"
	  	
	  $sql="SELECT  lop.id,lop,khoa FROM lop,khoa WHERE lop.danhmucidkhoa=khoa.id ";
	  $result=$conn->query($sql);
	  if ($result->num_rows >0) {
	  	$i=1;
	  
	 ?>
	   <tr><td colspan="6" align="center"><input type="text" name="timkiem"><input type="submit" name="search" value="search"></td></tr>
	   <tr><td colspan="6" align="center" style="color: red"><h2>DANH SÁCH LỚP</h2></td></tr>
	   <tr class="table-active"><td colspan="6" ><a href="themlop.php" class="btn btn-outline-primary">Thêm mới</a>
	   	<input type="submit" name="xoanhieu" value="xoa" class="btn btn-outline-danger"></td></tr>
	   <tr class=" table-success">
	   	<th>STT</th>
	   	<th>Lớp</th>
	   	<th>Khoa</th>
	   	<th>Chức năng</th>
	   </tr>	   
	   <?php 
	   while ($row =$result->fetch_assoc()) {
	        
	     ?>
             
      	<tr class="table-info">
	      	<?php echo '<td>'.$i.'</td>'; ?>
	      	<td><?= $row['lop'] ?></td>
	      	<td><?= $row['khoa'] ?></td>
	      	<td>
	      		<a href="xoalop.php?id=<?=$row["id"] ?>" class="btn btn-primary">Xóa<input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></a>
	      		<a href="select.php?id=<?=$row["id"] ?>" class="btn btn-outline-success">Sửa</a>
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