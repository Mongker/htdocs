<?php include_once('../../config/config.php');
 session_start();
		if($_SESSION["taikhoan"] == NULL){ ?>
			<script>
				window.location.href="../../tai-khoan/dang-nhap.php";
			</script>
		<?php } elseif($_SESSION["nhomtk"] != 1){ ?>
		      <script>
	    	window.location.href="../../index.php";
	    	</script>
		    </div>
		<?php }else {
	$sql = "SELECT * FROM `hoc_ky`";
	$qr = mysqli_query($conn, $sql);
		 ?>

			<div class="caption">
			Quản Lý Học Kỳ
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>ID</th>
						<th>Tên Học Kỳ</th>
						<th>Tên Lớp</th>
						<th>Quản Lý</th>
					</tr>
					<tbody>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $row["id_hoc_ky"]?></td>
							<td>
							<?php echo $row["ten_hoc_ky"]; ?>
								
							</td>
							<td><?php echo $row["ten_lop"]?></td>
							<td align="center">
								<button type="button" class="btn btn-warning btn-xs" title="Sửa" id="sua" hk="<?php echo $row["ten_hoc_ky"]?>" idhk="<?php echo $row["id_hoc_ky"]?>"><span class="glyphicon glyphicon-edit"></span>
								</button>
  								<button type="button" class="btn btn-danger btn-xs" title="Xóa" id="xoa" xoa="<?php echo $row["id_hoc_ky"]?>"><span class="glyphicon glyphicon-trash"></span>
  								</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>


<?php } ?><br>
<center>
	<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#themhocky">THÊM HỌC KỲ</button>
</center>



<!-- Modal Thêm Lop -->
<div class="modal fade" id="themhocky">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">THÊM HỌC KỲ MỚI</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          <div id="thongbaothemhk"></div>
				Tên Học Kỳ:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-time"></span>
			    </div>
			    <input class="form-control" id="hockymoi" type="text" autofocus="autofocus" placeholder="Tên học kỳ...">
			    </div>
			    </div>
			    Của Lớp:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-list"></span>
			    </div>
			    	<select id="cualop" class="form-control">
		    		<option value="">Chọn Lớp</option>
		    		<?php
		    		$sqllop = "SELECT * FROM `lop`";
		    		$chaylop = mysqli_query($conn,$sqllop);
		    		while($xemlop = mysqli_fetch_assoc($chaylop)){
		    		 ?>
		    		<option value="<?php echo $xemlop["ten_lop"];?>">
		    			<?php echo $xemlop["ten_lop"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
			    </div>
			    </div>

			    <br>
			    <center>
					<button type="button" id="themhockymoi" class="btn btn-success">THÊM HỌC KỲ</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Sửa lop-->
<div class="modal fade" id="ModalSuaHK">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">SỬA HỌC KỲ</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          	<div id="thongbaosuahk"></div>
				Tên Học Kỳ:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-timearge"></span>
			    </div>
			    <input type="text" id="idhk" style="display: none">
			    <input class="form-control" id="suatenhk" type="text" placeholder="Tên học kỳ...">
			    </div>

			    </div>
			    Của Lớp:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-list"></span>
			    </div>
			    	<select id="cuasualop" class="form-control">
		    		<option value="">Chọn Lớp</option>
		    		<?php
		    		$sqllop = "SELECT * FROM `lop`";
		    		$chaylop = mysqli_query($conn,$sqllop);
		    		while($xemlop = mysqli_fetch_assoc($chaylop)){
		    		 ?>
		    		<option value="<?php echo $xemlop["ten_lop"];?>">
		    			<?php echo $xemlop["ten_lop"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
			    </div>
			    </div>

			    <br>
			    <center>
					<button type="button" id="suahkmoi" class="btn btn-success">CẬP NHẬT</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal Edit lop -->

<script>
	$(document).ready(function() {
		$('#themhockymoi').click(function(){
			$.ajax({
			url: 'xu-ly/them-hoc-ky.php',
			type: 'POST',
			dataType: 'html',
			data: {
				hockymoi: $('#hockymoi').val(),
				cualop: $('#cualop').val()
				},
			success: function(data){
				$('#thongbaothemhk').html(data);
			}
			});
		});


		$('button#xoa').click(function(event) {
			var id = $(this).attr('xoa');
			var xoa = confirm("Bạn có thực sự muốn xóa Học Kỳ có id: "+id+" ?");
			if (xoa == true) {
		    $.ajax({
		    	url: 'xu-ly/xoa-hoc-ky.php',
		    	type: 'POST',
		    	dataType: 'HTML',
		    	data: {id: id},
		    });
		    alert("Xóa Thành Công!");
		    location.reload();
			}
		});

		$('button#sua').click(function(event) {
			var hk = $(this).attr('hk');
			var idhk = $(this).attr('idhk');
			$('#ModalSuaHK').modal();
			$('#suatenhk').val(hk);
			$('#idhk').val(idhk);
		});

		$('#suahkmoi').click(function(event) {
			$.ajax({
				url: 'xu-ly/sua-hoc-ky.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					idhk: $('#idhk').val(),
					suahk: $('#suatenhk').val(),
					cuasualop: $('#cuasualop').val()
				},
			success: function(data){
				$('#thongbaosuahk').html(data);
			}
			});
			
		});

	});
</script>