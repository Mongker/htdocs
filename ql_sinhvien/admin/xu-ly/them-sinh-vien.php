<?php 
	include_once('../../config/config.php');
	$masv = htmlspecialchars($_POST["masv"]);
	$matkhau = sha1(md5($masv));
	$tensv = htmlspecialchars($_POST["tensv"]);
	$svkhoa = htmlspecialchars($_POST["svkhoa"]);
	$svlop = htmlspecialchars($_POST["svlop"]);
	$hk = htmlspecialchars($_POST["hk"]);
	$sdt = htmlspecialchars($_POST["sdt"]);
	$ngaysinh = htmlspecialchars($_POST["ngaysinh"]);
	$nhanxet = htmlspecialchars($_POST["nhanxet"]);

	$sqlkhoa = "SELECT `ten_khoa` FROM `khoa` WHERE `id_khoa` = '$svkhoa'";
	$qrkhoa = mysqli_query($conn, $sqlkhoa);
	$rowkhoa = mysqli_fetch_assoc($qrkhoa);
	$ten_khoa = $rowkhoa["ten_khoa"];

	$kiemtra = "SELECT `ten_tai_khoan` FROM `tai_khoan` WHERE `ten_tai_khoan` = '$masv'";
	$chay = mysqli_query($conn, $kiemtra);
	$xem = mysqli_fetch_assoc($chay);

	$sqlmonhoc = "SELECT * FROM `mon_hoc` WHERE `ten_lop` = '$svlop' AND `id_hoc_ky` = '$hk'";
	$qrmonhoc = mysqli_query($conn, $sqlmonhoc);

	if($masv == NULL || $tensv == NULL || $svkhoa == NULL || $svlop == NULL || $hk == NULL || $sdt == NULL || $ngaysinh == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	<?php }elseif(mysqli_num_rows($chay) > 0){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Mã sinh viên <span style="font-weight:bold;text-transform: uppercase;text-decoration: underline;">
      	<?php echo $xem["ten_tai_khoan"];?>
      	</span> Đã tồn tại, Vui lòng vào <a href="admin?menu=quanly" style="color:#FFF"><strong>QUẢN LÝ SINH VIÊN</strong></a> để cập nhật thông tin.
    	</div>
	<?php } else{
		$themsv = "INSERT INTO `tai_khoan` (`ten_tai_khoan`, `mat_khau`, `nhom_tai_khoan`, `ten_sinh_vien`, `lop_sinh_vien`, `khoa_sinh_vien`, `sdt`, `ngay_sinh`, `anh_dai_dien`, `nhan_xet`, `ngay_tao`) VALUES ('$masv', '$matkhau', '0', '$tensv', '$svlop', '$ten_khoa', '$sdt', '$ngaysinh', 'avatardf.png', '$nhanxet', NOW())";
		mysqli_query($conn, $themsv); ?>
			<div class="alert alert-success fade in" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>GOOD!</strong> Thêm thành công, Bạn có muốn thêm điểm ngay cho Sinh viên <strong><?php echo $tensv;?></strong> ? <br> <br>
	      	<center>
	      	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#themdiem">THÊM ĐIỂM SV</button>
	      	<button type="button" id="themmoisv" class="btn btn-success">THÊM MỚI SV</button>
	      	</center>
	    	</div>

	    	<!-- Modal -->
				<div class="modal fade" id="themdiem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				        <h4 class="modal-title" id="myModalLabel">
				        THÊM ĐIỂM SINH VIÊN <strong><?php echo $tensv;?></strong>
				        </h4>
				      </div>
				      <div class="modal-body">
				        	<?php include_once('../them-diem.php'); ?>
				      </div>
				    </div>
				  </div>
				</div>
			<!-- End Modal -->
		<?php } ?>
<script>
	$(document).ready(function() {
		$('#themmoisv').click(function(event) {
			window.location.reload();
		});
	});
</script>