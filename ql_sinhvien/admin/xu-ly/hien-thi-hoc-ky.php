<?php 
	include_once('../../config/config.php');
	$lop = $_GET["lop"];
	$sql = "SELECT * FROM `hoc_ky` WHERE `ten_lop` = '$lop'";
	$qr = mysqli_query($conn, $sql);
	?>
		<option value="">Chọn Học Kỳ</option>
	<?php
	while($row = mysqli_fetch_assoc($qr)){ ?>
		<option value="<?php echo $row["id_hoc_ky"];?>">
			<?php echo $row["ten_hoc_ky"];?>
		</option>
	<?php }
 ?>