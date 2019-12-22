<!-- <?php 
	include_once('../../../config/config.php');

	$idmh = $_POST["idmh"];
	$dqt = $_POST["dqt"];
	$dt = $_POST["dt"];
	$dhp = ($dqt + $dt)/2;

	if($dhp > 9.0){
 		$dc = "A+";
 		$td = 4;
 	}elseif($dhp >= 8.5 && $dhp <= 8.9){
 		$dc = "A";
 		$td = 3.7;
 	}elseif($dhp >= 8.0 && $dhp <= 8.4){
 		$dc = "B+";
 		$td = 3.5;
 	}elseif($dhp >= 7.0 && $dhp <= 7.9){
 		$dc = "B";
 		$td = 3;
 	}elseif($dhp >= 6.5 && $dhp <= 6.9){
 		$dc = "C+";
 		$td = 2.5;
 	}elseif($dhp >= 5.5 && $dhp <= 6.4){
 		$dc = "C";
 		$td = 2;
 	}elseif($dhp >= 5.0 && $dhp <= 5.4){
 		$dc = "D+";
 		$td = 1.5;
 	}else{
 		$dc = "D";
 		$td = 1;
 	}

	if($dqt == NULL || $dt == NULL){ ?>

		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Điểm không được để trống.
    	</div>

	<?php }
	else{
		$sql = "UPDATE `diem` SET `diem_qua_trinh` = '$dqt', `diem_thi` = '$dt', `diem_hoc_phan` = '$dhp', `diem_chu` = '$dc', `thang_diem` = '$td' WHERE `diem`.`id_diem` = $idmh";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa điểm thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>

<?php }
?>

<script>
	
	$(document).ready(function() {
		$('#rfpage').click(function(event) {
			location.reload();
		});
	});

</script> -->