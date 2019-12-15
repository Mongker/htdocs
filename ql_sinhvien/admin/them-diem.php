<!-- <table class="table table-bordered">
	<tr class="chimuc">
		<th>Tên Môn Học</th>
		<th>Điểm Quá Trình</th>
		<th>Điểm Thi</th>
	</tr>
	<?php $i = 1;
	while($rowmonhoc = mysqli_fetch_assoc($qrmonhoc)){ ?>
	<tr>
		<td>
		<input class="form-control hidden" id="tenmonhoc<?php echo $i;?>" type="text" value="<?php echo $rowmonhoc["ten_mon_hoc"]; ?>">
		<strong><?php echo $rowmonhoc["ten_mon_hoc"]; ?></strong>
		</td>
		<td>
		<input class="form-control" id="diemquatrinh<?php echo $i;?>" type="number" placeholder="Điểm quá trình..." autofocus="autofocus">
	    </td>
		
		<td>
		<input class="form-control" id="diemthi<?php echo $i;?>" type="number" placeholder="Điểm thi...">
	    </td>
	</tr>
	<?php $i++; } ?>
</table>
<br>
<div id="thongbaodiemsv"></div>	
<center>
	<input type="submit" id="themdiemsv" class="btn btn-success" name="themdiemsv" value="THÊM ĐIỂM">
	<input type="submit" id="themmoisv2" class="btn btn-success" name="themmoisv" value="THÊM MỚI SV" style="display:none;">
</center>

<script>
	$(function() {
		$('input#themdiemsv').click(function(event) {
			$.ajax({
			url: 'xu-ly/them-diem-sinh-vien.php',
			type: 'POST',
			dataType: 'HTML',
			data: {
				masv: $('#masv').val(),
				tensv: $('#tensv').val(),
				hk: $('#hocky').val(),
				mh1: $('#tenmonhoc1').val(),
				dqt1: $('#diemquatrinh1').val(),
				dt1: $('#diemthi1').val(),
				mh2: $('#tenmonhoc2').val(),
				dqt2: $('#diemquatrinh2').val(),
				dt2: $('#diemthi2').val(),
				mh3: $('#tenmonhoc3').val(),
				dqt3: $('#diemquatrinh3').val(),
				dt3: $('#diemthi3').val(),
				mh4: $('#tenmonhoc4').val(),
				dqt4: $('#diemquatrinh4').val(),
				dt4: $('#diemthi4').val(),
				mh5: $('#tenmonhoc5').val(),
				dqt5: $('#diemquatrinh5').val(),
				dt5: $('#diemthi5').val(),
				mh6: $('#tenmonhoc6').val(),
				dqt6: $('#diemquatrinh6').val(),
				dt6: $('#diemthi6').val(),
				mh7: $('#tenmonhoc7').val(),
				dqt7: $('#diemquatrinh7').val(),
				dt7: $('#diemthi7').val(),
				mh8: $('#tenmonhoc8').val(),
				dqt8: $('#diemquatrinh8').val(),
				dt8: $('#diemthi8').val()
			},
			success: function(data){
				$('#thongbaodiemsv').html(data);
			}
			});
		
		});
	});
</script> -->