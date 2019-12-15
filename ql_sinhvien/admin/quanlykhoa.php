<?php include_once('../config/config.php');
 	session_start();
		if($_SESSION["taikhoan"] == NULL){ ?>
			<script>
				window.location.href="../tai-khoan/dang-nhap.php";
			</script>
		<?php } elseif($_SESSION["nhomtk"] != 1){ ?>
		      <script>
	    	window.location.href="../index.php";
	    	</script>
		    </div>
		<?php }else { ?>

		<?php
			$qrkhoa = mysqli_query($conn, "SELECT `ten_khoa` FROM `khoa`");

			$qrlop = mysqli_query($conn, "SELECT `ten_lop` FROM `lop`");

			$qrhk = mysqli_query($conn, "SELECT `id_hoc_ky` FROM `hoc_ky`");

			$qrmon = mysqli_query($conn, "SELECT `ten_mon_hoc` FROM `mon_hoc`");
		?>

		<div style="font-size: 30px;">
			Quản Lý Khoa
		</div>
		<hr><br>
			<div class="row" id="bangdk">
			<center>

				<div class="col-xs-6 col-md-6 col-md-3 col-lg-3">
					<div class="thongtindk">
					<table width="100%">
					<tr>
					<td>
						<span class="glyphicon glyphicon-th-large icon"></span>
					</td>
					<td align="right">
						<span class="numdk"><?php echo mysqli_num_rows($qrkhoa);?></span> <br>
						<span>KHOA</span>
					</td>
					</tr>
					</table>
					<hr>
					<a href="khoa/?menu=khoa">
					Xem chi tiết
					<span class="glyphicon glyphicon-arrow-right" style="float: right;"></span>
					</a>
					</div>
				</div>

				<div class="col-xs-6 col-md-6 col-md-3 col-lg-3">
					<div class="thongtindk">
					<table width="100%">
					<tr>
					<td>
						<span class="glyphicon glyphicon-th-list icon"></span>
					</td>
					<td align="right">
						<span class="numdk"><?php echo mysqli_num_rows($qrlop);?></span> <br>
						<span>LỚP</span>
					</td>
					</tr>
					</table>
					<hr>
					<a href="khoa/?menu=lop">
					Xem chi tiết
					<span class="glyphicon glyphicon-arrow-right" style="float: right;"></span>
					</a>
					</div>
				</div>

				<div class="col-xs-6 col-md-6 col-md-3 col-lg-3">
					<div class="thongtindk">
					<table width="100%">
					<tr>
					<td>
						<span class="glyphicon glyphicon-time icon"></span>
					</td>
					<td align="right">
						<span class="numdk"><?php echo mysqli_num_rows($qrhk);?></span> <br>
						<span>HỌC KỲ</span>
					</td>
					</tr>
					</table>
					<hr>
					<a href="khoa/?menu=hocky">
					Xem chi tiết
					<span class="glyphicon glyphicon-arrow-right" style="float: right;"></span>
					</a>
					</div>
				</div>

				<div class="col-xs-6 col-md-6 col-md-3 col-lg-3">
					<div class="thongtindk">
					<table width="100%">
					<tr>
					<td>
						<span class="glyphicon glyphicon-list-alt icon"></span>
					</td>
					<td align="right">
						<span class="numdk"><?php echo mysqli_num_rows($qrmon);?></span> <br>
						<span>MÔN HỌC</span>
					</td>
					</tr>
					</table>
					<hr>
					<a href="khoa/?menu=monhoc">
					Xem chi tiết
					<span class="glyphicon glyphicon-arrow-right" style="float: right;"></span>
					</a>
					</div>
				</div>
				</center>
			</div>
<?php } ?>

<script>
 	$(document).ready(function() {
 		$('a#quanlykhoa').addClass('chon');
 		$('a#themsv').removeClass('chon');
 		$('a#quanlysv').removeClass('chon');
 		$('a#bangdk').removeClass('chon');
 	});
 </script>