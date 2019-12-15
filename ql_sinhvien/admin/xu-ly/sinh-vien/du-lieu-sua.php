<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];
	$sql = "SELECT * FROM `tai_khoan` WHERE `id_tai_khoan` = $id";
	$qr = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($qr);

 ?>

<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<input type="text" id="idsv" value="<?php echo $id?>" style="display: none">
		Mã Sinh Viên:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    	<span class="glyphicon glyphicon-barcode"></span>
		    </div>
		    <input class="form-control" id="masv" type="text" placeholder="Mã sinh viên..." value="<?php echo $row["ten_tai_khoan"]?>" style="color:#000" disabled>
		    </div>
	    </div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		Họ Tên Sinh Viên:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    <span class="glyphicon glyphicon-user"></span>
		    </div>
		    <input class="form-control" id="tensv" type="text" placeholder="Họ tên sinh viên..." value="<?php echo $row["ten_sinh_vien"]?>" autofocus="autofocus" >
		    </div>
	    </div>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
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
		    		 ?>
		    		<option value="<?php echo $xemkhoa["id_khoa"];?>">
		    			<?php echo $xemkhoa["ten_khoa"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
		    </div>
	    </div>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
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

	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
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
		    <input class="form-control" id="sdt" type="number" placeholder="Số điện thoại..." value="<?php echo $row["sdt"]?>">
		    </div>
	    </div>
	    Ngày Sinh:
		<div class="form-group">
		    <div class="input-group">
		    <div class="input-group-addon">
		    <span class="glyphicon glyphicon-calendar"></span>
		    </div>
		    <input class="form-control" id="ngaysinh" type="text" placeholder="dd/mm/yyyy" value="<?php echo $row["ngay_sinh"]?>">
		    </div>
	    </div>

	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

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
		    <textarea id="nhanxet" class="form-control" placeholder="Giáo viên nhận xét ..."><?php echo $row["nhan_xet"]?></textarea>
		    </div>
	    </div>
	</div>

</div>

<script>
	
	/*== Hiển Thị Lớp ==*/
$(document).ready(function() {
	$('#svkhoa').change(function(event) {
		var id = $(this).val();
		$.get('xu-ly/hien-thi-lop.php',{id:id}, function(data) {
			$('#svlop').html(data);
		});
	});
});

/*== Hiển Thị Học Kỳ ==*/
$(document).ready(function() {
	$('#svlop').change(function(event) {
		var lop = $(this).val();
		$.get('xu-ly/hien-thi-hoc-ky.php', {lop:lop}, function(data) {
             $('#hocky').html(data);
		});
	});
});

/*== Hiển Thị Môn Học ==*/
$(document).ready(function() {
	$('#hocky').change(function(event) {
		var idhk = $(this).val();
		$.ajax({
			url: 'xu-ly/hien-thi-mon-hoc.php',
			type: 'POST',
			dataType: 'HTML',
			data: {
				idhk: idhk,
				lop: $('#svlop').val()
			},
		success: function(data) {
			$('#monhoc').html(data);
		}
		});
		
	});
});

/*== Thêm Sinh Viên ==*/
$(document).ready(function() {
	$('#suasinhvien').click(function(event) {
		$.ajax({
			url: 'xu-ly/sua-sinh-vien.php',
			type: 'POST',
			dataType: 'HTML',
			data: {
				idsv: $('#idsv').val(),
				tensv: $('#tensv').val(),
				svkhoa: $('#svkhoa').val(),
				svlop: $('#svlop').val(),
				hk: $('#hocky').val(),
				sdt: $('#sdt').val(),
				ngaysinh: $('#ngaysinh').val(),
				nhanxet: $('#nhanxet').val()
			},
		success: function(data){
			$('#thongbaothem').html(data);
		}
		});
		
	});
});
</script>