<!-- <?php 
	include_once('../../config/config.php');
 ?>

 <?php 
 	$masv = htmlspecialchars($_POST["masv"]);
 	$tensv = htmlspecialchars($_POST["tensv"]);
 	$hk = (int)$_POST["hk"];

 	$mh1 = $_POST["mh1"];
 	$dqt1 = $_POST["dqt1"];
 	$dt1 = $_POST["dt1"];
 	$dhp1 = ($dqt1 + $dt1)/2;

 	if($dhp1 > 9.0){
 		$dc1 = "A+";
 		$td1 = 4;
 	}elseif($dhp1 >= 8.5 && $dhp1 <= 8.9){
 		$dc1 = "A";
 		$td1 = 3.7;
 	}elseif($dhp1 >= 8.0 && $dhp1 <= 8.4){
 		$dc1 = "B+";
 		$td1 = 3.5;
 	}elseif($dhp1 >= 7.0 && $dhp1 <= 7.9){
 		$dc1 = "B";
 		$td1 = 3;
 	}elseif($dhp1 >= 6.5 && $dhp1 <= 6.9){
 		$dc1 = "C+";
 		$td1 = 2.5;
 	}elseif($dhp1 >= 5.5 && $dhp1 <= 6.4){
 		$dc1 = "C";
 		$td1 = 2;
 	}elseif($dhp1 >= 5.0 && $dhp1 <= 5.4){
 		$dc1 = "D+";
 		$td1 = 1.5;
 	}else{
 		$dc1 = "D";
 		$td1 = 1;
 	}

 	$mh2 = $_POST["mh2"];
 	$dqt2 = $_POST["dqt2"];
 	$dt2 = $_POST["dt2"];
 	$dhp2 = ($dqt2 + $dt2)/2;
 	if($dhp2 > 9.0){
 		$dc2 = "A+";
 		$td2 = 4;
 	}elseif($dhp2 >= 8.5 && $dhp2 <= 8.9){
 		$dc2 = "A";
 		$td2 = 3.7;
 	}elseif($dhp2 >= 8.0 && $dhp2 <= 8.4){
 		$dc2 = "B+";
 		$td2 = 3.5;
 	}elseif($dhp2 >= 7.0 && $dhp2 <= 7.9){
 		$dc2 = "B";
 		$td2 = 3;
 	}elseif($dhp2 >= 6.5 && $dhp2 <= 6.9){
 		$dc2 = "C+";
 		$td2 = 2.5;
 	}elseif($dhp2 >= 5.5 && $dhp2 <= 6.4){
 		$dc2 = "C";
 		$td2 = 2;
 	}elseif($dhp2 >= 5.0 && $dhp2 <= 5.4){
 		$dc2 = "D+";
 		$td2 = 1.5;
 	}else{
 		$dc2 = "D";
 		$td2 = 1;
 	}

 	$mh3 = $_POST["mh3"];
 	$dqt3 = $_POST["dqt3"];
 	$dt3 = $_POST["dt3"];
 	$dhp3 = ($dqt3 + $dt3)/2;
 	if($dhp3 > 9.0){
 		$dc3 = "A+";
 		$td3 = 4;
 	}elseif($dhp3 >= 8.5 && $dhp3 <= 8.9){
 		$dc3 = "A";
 		$td3 = 3.7;
 	}elseif($dhp3 >= 8.0 && $dhp3 <= 8.4){
 		$dc3 = "B+";
 		$td3 = 3.5;
 	}elseif($dhp3 >= 7.0 && $dhp3 <= 7.9){
 		$dc3 = "B";
 		$td3 = 3;
 	}elseif($dhp3 >= 6.5 && $dhp3 <= 6.9){
 		$dc3 = "C+";
 		$td3 = 2.5;
 	}elseif($dhp3 >= 5.5 && $dhp3 <= 6.4){
 		$dc3 = "C";
 		$td3 = 2;
 	}elseif($dhp3 >= 5.0 && $dhp3 <= 5.4){
 		$dc3 = "D+";
 		$td3 = 1.5;
 	}else{
 		$dc3 = "D";
 		$td3 = 1;
 	}

 	$mh4 = $_POST["mh4"];
 	$dqt4 = $_POST["dqt4"];
 	$dt4 = $_POST["dt4"];
 	$dhp4 = ($dqt4 + $dt4)/2;
 	if($dhp4 > 9.0){
 		$dc4 = "A+";
 		$td4 = 4;
 	}elseif($dhp4 >= 8.5 && $dhp4 <= 8.9){
 		$dc4 = "A";
 		$td4 = 3.7;
 	}elseif($dhp4 >= 8.0 && $dhp4 <= 8.4){
 		$dc4 = "B+";
 		$td4 = 3.5;
 	}elseif($dhp4 >= 7.0 && $dhp4 <= 7.9){
 		$dc4 = "B";
 		$td4 = 3;
 	}elseif($dhp4 >= 6.5 && $dhp4 <= 6.9){
 		$dc4 = "C+";
 		$td4 = 2.5;
 	}elseif($dhp4 >= 5.5 && $dhp4 <= 6.4){
 		$dc4 = "C";
 		$td4 = 2;
 	}elseif($dhp4 >= 5.0 && $dhp4 <= 5.4){
 		$dc4 = "D+";
 		$td4 = 1.5;
 	}else{
 		$dc4 = "D";
 		$td4 = 1;
 	}

 	$mh5 = $_POST["mh5"];
 	$dqt5 = $_POST["dqt5"];
 	$dt5 = $_POST["dt5"];
 	$dhp5 = ($dqt5 + $dt5)/2;
 	if($dhp5 > 9.0){
 		$dc5 = "A+";
 		$td5 = 4;
 	}elseif($dhp5 >= 8.5 && $dhp5 <= 8.9){
 		$dc5 = "A";
 		$td5 = 3.7;
 	}elseif($dhp5 >= 8.0 && $dhp5 <= 8.4){
 		$dc5 = "B+";
 		$td5 = 3.5;
 	}elseif($dhp5 >= 7.0 && $dhp5 <= 7.9){
 		$dc5 = "B";
 		$td5 = 3;
 	}elseif($dhp5 >= 6.5 && $dhp5 <= 6.9){
 		$dc5 = "C+";
 		$td5 = 2.5;
 	}elseif($dhp5 >= 5.5 && $dhp5 <= 6.4){
 		$dc5 = "C";
 		$td5 = 2;
 	}elseif($dhp5 >= 5.0 && $dhp5 <= 5.4){
 		$dc5 = "D+";
 		$td5 = 1.5;
 	}else{
 		$dc5 = "D";
 		$td5 = 1;
 	}

 	$mh6 = $_POST["mh6"];
 	$dqt6 = $_POST["dqt6"];
 	$dt6 = $_POST["dt6"];
 	$dhp6 = ($dqt6 + $dt6)/2;
 	if($dhp6 > 9.0){
 		$dc6 = "A+";
 		$td6 = 4;
 	}elseif($dhp6 >= 8.5 && $dhp6 <= 8.9){
 		$dc6 = "A";
 		$td6 = 3.7;
 	}elseif($dhp6 >= 8.0 && $dhp6 <= 8.4){
 		$dc6 = "B+";
 		$td6 = 3.5;
 	}elseif($dhp6 >= 7.0 && $dhp6 <= 7.9){
 		$dc6 = "B";
 		$td6 = 3;
 	}elseif($dhp6 >= 6.5 && $dhp6 <= 6.9){
 		$dc6 = "C+";
 		$td6 = 2.5;
 	}elseif($dhp6 >= 5.5 && $dhp6 <= 6.4){
 		$dc6 = "C";
 		$td6 = 2;
 	}elseif($dhp6 >= 5.0 && $dhp6 <= 5.4){
 		$dc6 = "D+";
 		$td6 = 1.5;
 	}else{
 		$dc6 = "D";
 		$td6 = 1;
 	}

 	$mh7 = $_POST["mh7"];
 	$dqt7 = $_POST["dqt7"];
 	$dt7 = $_POST["dt7"];
 	$dhp7 = ($dqt7 + $dt7)/2;
 	if($dhp7 > 9.0){
 		$dc7 = "A+";
 		$td7 = 4;
 	}elseif($dhp7 >= 8.5 && $dhp7 <= 8.9){
 		$dc7 = "A";
 		$td7 = 3.7;
 	}elseif($dhp7 >= 8.0 && $dhp7 <= 8.4){
 		$dc7 = "B+";
 		$td7 = 3.5;
 	}elseif($dhp7 >= 7.0 && $dhp7 <= 7.9){
 		$dc7 = "B";
 		$td7 = 3;
 	}elseif($dhp7 >= 6.5 && $dhp7 <= 6.9){
 		$dc7 = "C+";
 		$td7 = 2.5;
 	}elseif($dhp7 >= 5.5 && $dhp7 <= 6.4){
 		$dc7 = "C";
 		$td7 = 2;
 	}elseif($dhp7 >= 5.0 && $dhp7 <= 5.4){
 		$dc7 = "D+";
 		$td7 = 1.5;
 	}else{
 		$dc7 = "D";
 		$td7 = 1;
 	}

 	$mh8 = $_POST["mh8"];
 	$dqt8 = $_POST["dqt8"];
 	$dt8 = $_POST["dt8"];
 	$dhp8 = ($dqt8 + $dt8)/2;
 	if($dhp8 > 9.0){
 		$dc8 = "A+";
 		$td8 = 4;
 	}elseif($dhp8 >= 8.5 && $dhp8 <= 8.9){
 		$dc8 = "A";
 		$td8 = 3.7;
 	}elseif($dhp8 >= 8.0 && $dhp8 <= 8.4){
 		$dc8 = "B+";
 		$td8 = 3.5;
 	}elseif($dhp8 >= 7.0 && $dhp8 <= 7.9){
 		$dc8 = "B";
 		$td8 = 3;
 	}elseif($dhp8 >= 6.5 && $dhp8 <= 6.9){
 		$dc8 = "C+";
 		$td8 = 2.5;
 	}elseif($dhp8 >= 5.5 && $dhp8 <= 6.4){
 		$dc8 = "C";
 		$td8 = 2;
 	}elseif($dhp8 >= 5.0 && $dhp8 <= 5.4){
 		$dc8 = "D+";
 		$td8 = 1.5;
 	}else{
 		$dc8 = "D";
 		$td8 = 1;
 	}
  ?>

<?php 
	if($masv == NULL || $tensv == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Mã SV và Tên SV không được để trống.
    	</div>
	<?php } else{

		if($mh1 == NULL || $dqt1 == 0 || $dt1 == 0){?>
			<div class="alert alert-warning fade in" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>ERROR!</strong> Vui lòng nhập đủ thông tin các môn.
	    	</div>
		<?php } else{
			$sql1 = "INSERT INTO `diem` (`ma_sinh_vien`, `ten_sinh_vien`,`id_hoc_ky`, `ten_mon_hoc`, `diem_qua_trinh`, `diem_thi`, `diem_hoc_phan`, `diem_chu`, `thang_diem`) VALUES ('$masv', '$tensv', '$hk', '$mh1', '$dqt1', '$dt1', '$dhp1', '$dc1', '$td1')";
			mysqli_query($conn, $sql1); ?>
			<div class="alert alert-success fade in" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>GOOD!</strong> Thêm điểm cho sinh viên <strong><?php echo $tensv;?></strong> thành công.
	    	</div>
	    	<script>
	    		$('#themdiemsv').hide();
		        $('#themmoisv2').show();

		        $('#themmoisv2').click(function(event) {
			    window.location.reload();
		        });
	    	</script>
		<?php }

		if($mh2 == NULL || $dqt2 == 0 || $dt2 == 0){} else{
			$sql2 = "INSERT INTO `diem` (`ma_sinh_vien`, `ten_sinh_vien`,`id_hoc_ky`, `ten_mon_hoc`, `diem_qua_trinh`, `diem_thi`, `diem_hoc_phan`, `diem_chu`, `thang_diem`) VALUES ('$masv', '$tensv', '$hk', '$mh2', '$dqt2', '$dt2', '$dhp2', '$dc2', '$td2')";
			mysqli_query($conn, $sql2);}

		if($mh3 == NULL || $dqt3 == 0 || $dt3 == 0){} else{
			$sql3 = "INSERT INTO `diem` (`ma_sinh_vien`, `ten_sinh_vien`,`id_hoc_ky`, `ten_mon_hoc`, `diem_qua_trinh`, `diem_thi`, `diem_hoc_phan`, `diem_chu`, `thang_diem`) VALUES ('$masv', '$tensv', '$hk', '$mh3', '$dqt3', '$dt3', '$dhp3', '$dc3', '$td3')";
			mysqli_query($conn, $sql3);}

		if($mh4 == NULL || $dqt4 == 0 || $dt4 == 0){} else{
			$sql4 = "INSERT INTO `diem` (`ma_sinh_vien`, `ten_sinh_vien`,`id_hoc_ky`, `ten_mon_hoc`, `diem_qua_trinh`, `diem_thi`, `diem_hoc_phan`, `diem_chu`, `thang_diem`) VALUES ('$masv', '$tensv', '$hk', '$mh4', '$dqt4', '$dt4', '$dhp4', '$dc4', '$td4')";
			mysqli_query($conn, $sql4);}

		if($mh5 == NULL || $dqt5 == 0 || $dt5 == 0){} else{
			$sql5 = "INSERT INTO `diem` (`ma_sinh_vien`, `ten_sinh_vien`,`id_hoc_ky`, `ten_mon_hoc`, `diem_qua_trinh`, `diem_thi`, `diem_hoc_phan`, `diem_chu`, `thang_diem`) VALUES ('$masv', '$tensv', '$hk', '$mh5', '$dqt5', '$dt5', '$dhp5', '$dc5', '$td5')";
			mysqli_query($conn, $sql5);}

		if($mh6 == NULL || $dqt6 == 0 || $dt6 == 0){} else{
			$sql6 = "INSERT INTO `diem` (`ma_sinh_vien`, `ten_sinh_vien`,`id_hoc_ky`, `ten_mon_hoc`, `diem_qua_trinh`, `diem_thi`, `diem_hoc_phan`, `diem_chu`, `thang_diem`) VALUES ('$masv', '$tensv', '$hk', '$mh6', '$dqt6', '$dt6', '$dhp6', '$dc6', '$td6')";
			mysqli_query($conn, $sql6);}

		if($mh7 == NULL || $dqt7 == 0 || $dt7 == 0){} else{
			$sql7 = "INSERT INTO `diem` (`ma_sinh_vien`, `ten_sinh_vien`,`id_hoc_ky`, `ten_mon_hoc`, `diem_qua_trinh`, `diem_thi`, `diem_hoc_phan`, `diem_chu`, `thang_diem`) VALUES ('$masv', '$tensv', '$hk', '$mh7', '$dqt7', '$dt7', '$dhp7', '$dc7', '$td7')";
			mysqli_query($conn, $sql7);}

		if($mh8 == NULL || $dqt8 == 0 || $dt8 == 0){} else{
			$sql8 = "INSERT INTO `diem` (`ma_sinh_vien`, `ten_sinh_vien`,`id_hoc_ky`, `ten_mon_hoc`, `diem_qua_trinh`, `diem_thi`, `diem_hoc_phan`, `diem_chu`, `thang_diem`) VALUES ('$masv', '$tensv', '$hk', '$mh8', '$dqt8', '$dt8', '$dhp8', '$dc8', '$td8')";
			mysqli_query($conn, $sql8);}

	}
 ?> -->