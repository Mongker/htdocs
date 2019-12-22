<?php 
	include_once('../../config/config.php');
	$idhk = $_POST["idhk"];
	$lop = $_POST["lop"];
	$sql = "SELECT * FROM `mon_hoc` WHERE `ten_lop` = '$lop' AND `id_hoc_ky` = '$idhk'";
	$qr = mysqli_query($conn, $sql);
	if(mysqli_num_rows($qr) == 0){ ?>
		<option value="" disabled>Không Có Dữ Liệu Môn Học.</option>
	<?php } else {
	?>
		<option value="" disabled>Danh Sách Môn Học</option>
	<?php
	while($row = mysqli_fetch_assoc($qr)){ ?>
		<option value="<?php echo $row["id_mon_hoc"];?>">
			<?php echo $row["ten_mon_hoc"];?>
		</option>
	<?php }}
 ?>