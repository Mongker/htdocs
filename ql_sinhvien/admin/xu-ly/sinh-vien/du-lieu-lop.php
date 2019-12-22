<?php session_start();
	include_once('../../../config/config.php');
	if($_SESSION["nhomtk"] == 1)
	{

		$id = $_GET["id"];
		$sql = "SELECT * FROM `tai_khoan` WHERE `lop_sinh_vien` = '$id'";
		$qr = mysqli_query($conn, $sql);

		if($id == NULL)
		{ ?><tr>
			<td colspan="8">
			<div class="alert alert-info fade in" role="alert">
		      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		      	<strong>NOTE!</strong> Chọn tên lớp để hiển thị danh sách sinh viên!.
	    	</div>
	    	</td>
	    	</tr>
		<?php }
		else if(mysqli_num_rows($qr) == 0)
		{ ?><tr>
			<td colspan="8">
			<div class="alert alert-info fade in" role="alert">
		      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		      	<strong>ERROR!</strong> Lớp <strong><?php echo $id;?></strong> hiện chưa có sinh viên nào!.
	    	</div>
	    	</td>
	    	</tr>
		<?php }
		else
		{
		while($row = mysqli_fetch_assoc($qr)){ ?>
			<tr>
				<td><?php echo $row["id_tai_khoan"]?></td>
				<td><a href="sinhvien.php?masv=<?php echo $row["ten_tai_khoan"]?>&lop=<?php echo $row["lop_sinh_vien"]?>" style="color:#FFF" target=_blank><?php echo $row["ten_tai_khoan"]?></a></td>
				<td><?php echo $row["ten_sinh_vien"]?></td>
				<td><?php echo $row["khoa_sinh_vien"]?></td>
				<td><?php echo $row["lop_sinh_vien"]?></td>
				<td><?php echo $row["sdt"]?></td>
				<td><?php echo $row["ngay_sinh"]?></td>
				<td align="center">
					<button sua="<?php echo $row["id_tai_khoan"]?>" class="btn btn-warning btn-xs" id="sua" title="Sửa"><span class="glyphicon glyphicon-edit"></span>
					</button>
						<button xoa="<?php echo $row["id_tai_khoan"]?>" class="btn btn-danger btn-xs" id="xoa" title="Xóa"><span class="glyphicon glyphicon-trash"></span>
						</button>
				</td>
			</tr>
		<?php }} ?>
		<script>
	$('button#xoa').click(function(event) {
 			var id = $(this).attr('xoa');
 			var xoa = confirm("Bạn có thực sự muốn xóa sinh viên có id: "+id+" ?");
			if (xoa == true) {
			    $.ajax({
			    	url: 'xu-ly/xoa-sinh-vien.php',
			    	type: 'POST',
			    	dataType: 'HTML',
			    	data: {id: id},
			    });
			    alert("Xóa Thành Công!");
			    location.reload();
			}
 		});

 		$('button#sua').click(function() {
 			$('#ModalEdit').modal();
 			var id = $(this).attr('sua');

 			$.ajax({
 				url: 'xu-ly/sinh-vien/du-lieu-sua.php',
 				type: 'POST',
 				dataType: 'HTML',
 				data: {id: id},
 				success: function(data){
 					$('#noidungsua').html(data);
 				}
 			});
 			
 		});
</script>
<?php	}
	else {}
 ?>