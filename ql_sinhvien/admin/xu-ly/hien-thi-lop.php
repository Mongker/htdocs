<?php 
	include_once('../../config/config.php');
	$id = $_GET["id"];
	$sql = "SELECT * FROM `lop` WHERE `id_khoa` = '$id'";
	$qr = mysqli_query($conn, $sql);
	?>
		<option value="">Chọn Lớp</option>
	<?php
	while($row = mysqli_fetch_assoc($qr)){ ?>
		<option value="<?php echo $row["ten_lop"];?>">
			<?php echo $row["ten_lop"];?>
		</option>
	<?php }
 ?>