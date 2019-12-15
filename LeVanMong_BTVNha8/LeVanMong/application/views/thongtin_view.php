<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thông tin sinh viên</title>
	<script type="text/javascript" src="<?= base_url() ?>vendor/bootstrap.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
	
</head>
<body>
	<?php 
	include "navbartt_view.php" 
	?>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<center><img class="aligncenter wp-image-52787 size-full" src="http://saobiz.net/wp-content/uploads/2016/09/anh-nong-ngoc-trinh.jpg" alt="Ảnh nóng Ngọc Trinh" width="660" height="396">
				</center>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
		       <div class="alert alert-success" role="alert" align="center">
		     	<strong><h1>Danh sach sinh viên</h1></strong>
			   </div>
		    </div>
	    </div>
    </div>

    <div class="container">
    	<div class="row card-deck">
    		<?php foreach ($alldata as $value): ?>
			<div class="col-sm-4">
				<div class="card">
					<div class="card-block">
						<h4 class="card-title"><?= $value['name'] ?></h4>
						<p class="card-text"><?= $value['address'] ?></p>
						<p class="card-text"><?= $value['birthday'] ?></p>
						<p class="card-text"><?= $value['class'] ?></p>
						<p class="card-text"><?= $value['sex'] ?></p>
						<a href="<?= base_url() ?>qltt/sua/<?= $value['id'] ?>" class="btn btn-outline-primary">Sữa</a>
						<a href="<?= base_url() ?>qltt/xoa/<?= $value['id'] ?>" class="btn btn-outline-danger">Xóa</a>
						
					</div>
				</div>
			</div><!--Hết col-4-->
		<?php endforeach ?>
    		
    	</div>
    </div>

	
	<div class="container">
		<div class="row">
			<div class="col-sm-6 push-sm-3">
				<!--<form method="POST" action="themtt">-->
  <div class="form-group">
    <label for="exampleInputEmail1">Tên</label>
    <input id="name" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên ">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Địa chỉ</label>
    <input id="address" name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập đc">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Ngày sinh</label>
    <input id="birthday" name="birthday" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập ngày sinh">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Lớp</label>
    <input id="class" name="class" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập lớp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Giới tính</label>
    <input id="sex" name="sex" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập giới tính">
  </div>
  
  <button type="button" class="btn btn-outline-danger click">Thêm</button>
	<script>
	$('.click').click(function(event) {
		/* Act on the event */
		$.ajax({
			url: 'qltt/addAjax',
			type: 'POST',
			dataType: 'JSON',
			data: {
				name:$('#name').val(),
				address:$('#address').val(),
				birthday:$('#birthday').val(),
				class:$('#class').val(),
				sex:$('#sex').val()
			},
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
			noidung="";
			noidung+='<div class="col-sm-4">';
			noidung+='<div class="card">';
			noidung+='<div class="card-block">';
			noidung+='<h4 class="card-title">'+$('#name').val()+'</h4>';
			noidung+='<p class="card-text">'+$('#address').val()+'</p>';
			noidung+='<p class="card-text">'+$('#birthday').val()+'</p>';
			noidung+='<p class="card-text">'+$('#class').val()+'</p>';
			noidung+='<p class="card-text">'+$('#sex').val()+'</p>';
			noidung+='<a href="<?= base_url() ?>qltt/sua/<?= $value["id"] ?>" class="btn btn-outline-primary">Sữa</a>';
			noidung+='<a href="<?= base_url() ?>qltt/xoa/<?= $value["id"] ?>" class="btn btn-outline-danger">Xóa</a>';
			noidung+='</div>';
			noidung+='</div>';
			noidung+='</div><!--Hết col-4-->';
			$('.card-deck').append(noidung);
		});
		
	});
						
</script>
</body>
</html>