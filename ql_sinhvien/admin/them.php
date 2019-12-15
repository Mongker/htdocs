<?php session_start();
		include_once('../config/config.php');
		if($_SESSION["taikhoan"] == NULL){ ?>
			<script>
				window.location.href="../tai-khoan/dang-nhap.php";
			</script>
		<?php } elseif($_SESSION["nhomtk"] != 1){ ?>
		      <script>
	    	window.location.href="../index.php";
	    	</script>
		    </div>
		<?php }else {
		$now = getdate();
		 ?>
<div class="caption">
	Thêm Mới Sinh Viên
</div>
<hr>
<div class="row">
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5"> 
		Mã Sinh Viên:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    	<span class="glyphicon glyphicon-barcode"></span>
		    </div>
		    <input class="form-control" id="masv" type="text" autofocus="autofocus">
		    </div>
	    </div>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
		Họ Tên Sinh Viên:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    <span class="glyphicon glyphicon-user"></span>
		    </div>
		    <input class="form-control" id="tensv" type="text" placeholder="Họ tên sinh viên...">
		    </div>
	    </div>
	</div>

	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5"> 
		Sinh Viên Khoa:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    	<span class="glyphicon glyphicon-th-large"></span>
		    </div>
		    	<select id="svkhoa" class="form-control">
		    		<option value="">Chọn Khoa</option>
		    		<?php
		    		$sqlkhoa = "SELECT * FROM `khoa`";
		    		$chaykhoa = mysqli_query($conn,$sqlkhoa);
		    		while($xemkhoa = mysqli_fetch_assoc($chaykhoa)){
		    		 ?>aa
		    		<option value="<?php echo $xemkhoa["id_khoa"];?>">
		    			<?php echo $xemkhoa["ten_khoa"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
		    </div>
	    </div>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
		Sinh Viên Lớp:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    	<span class="glyphicon glyphicon-th-list"></span>
		    </div>
		    	<select id="svlop" class="form-control">
		    	<option value="">Chọn Lớp</option>
		    	</select>
		    </div>
	    </div>
	</div>

	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5"> 
		Học Kỳ - Năm Học:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    	<span class="glyphicon glyphicon-time"></span>
		    </div>
		    	<select id="hocky" class="form-control">
		    		<option value="">Chọn Học Kỳ</option>
		    	</select>
		    </div>
	    </div>

		Số Điện Thoại:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    <span class="glyphicon glyphicon-phone"></span>
		    </div>
		    <input class="form-control" id="sdt" type="number" placeholder="Số điện thoại...">
		    </div>
	    </div>
	    Ngày Sinh:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    <span class="glyphicon glyphicon-calendar"></span>
		    </div>
		    <input class="form-control" id="ngaysinh" type="text" placeholder="dd/mm/yyyy">
		    </div>
	    </div>

	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">

		 Môn Học:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    	<span class="glyphicon glyphicon-list-alt"></span>
		    </div>
		    	<select id="monhoc" class="form-control" multiple>
		    		
		    	</select>
		    </div>
	    </div>

		Giáo Viên Nhận Xét :
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    	<span class="glyphicon glyphicon-comment"></span>
		    </div>
		    <textarea id="nhanxet" class="form-control" placeholder="Giáo viên nhận xét ..."></textarea>
		    </div>
	    </div>
	</div>

</div>
<div id="thongbaothem"></div>	
<center>
	<button type="button" id="themsinhvien" class="btn btn-success">THÊM SINH VIÊN</button>
</center>
<?php } ?>
<script>
	$(document).ready(function() {
		$('a#themsv').addClass('chon');
		$('a#bangdk').removeClass('chon');
		$('a#quanlysv').removeClass('chon');
		$('a#quanlykhoa').removeClass('chon');
	});
</script>