

/*== Form Đăng Nhập ==*/
$(document).ready(function() {
	$('#dangnhaptk').click(function(event) {
		$.ajax({
			url: 'xu-ly.php',
			type: 'POST',
			dataType: 'html',
			data: {
				taikhoanlg: $('#taikhoanlg').val(),
				matkhaulg: $('#matkhaulg').val()
			},
		success: function(data){
			$('#thongbaodn').html(data);
		}
		});
 });
});

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
	$('#themsinhvien').click(function(event) {
		$.ajax({
			url: 'xu-ly/them-sinh-vien.php',
			type: 'POST',
			dataType: 'HTML',
			data: {
				masv: $('#masv').val(),
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