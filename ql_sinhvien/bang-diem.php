 <?php 
	include_once('config/config.php');
 ?>
<?php 
	$taikhoan = $_SESSION["taikhoan"];
	$sql = "SELECT * FROM `diem` WHERE `ma_sinh_vien` = '$taikhoan'";
	$qr = mysqli_query($conn, $sql);

	$lop = $_SESSION["lopsv"];
	$sqlhk = "SELECT * FROM `hoc_ky` WHERE `ten_lop` = '$lop'";
	$qrhk = mysqli_query($conn, $sqlhk);
 ?>
	<table class="table table-bordered table-responsive">
	     <tr class="chimuc">
	         <th>Tên Môn Học</th>
	         <th>Điểm Qúa Trình</th>
	         <th>Điểm Thi</th>
	         <th>Điểm Học Phần</th>
	         <th>Điểm Chữ</th>
	         <th>Thang Điểm</th>
	     </tr>
	     <?php while($row = mysqli_fetch_assoc($qr)){?>
	     <tr>
	     	<td><?php echo $row["ten_mon_hoc"]?></td>
	     	<td><?php echo $row["diem_qua_trinh"]?></td>
	     	<td><?php echo $row["diem_thi"]?></td>
	     	<td><?php echo $row["diem_hoc_phan"]?></td>
	     	<td><?php echo $row["diem_chu"]?></td>
	     	<td><?php echo $row["thang_diem"]?></td>
	     </tr>
	     <?php } ?>
	</table>
</div>