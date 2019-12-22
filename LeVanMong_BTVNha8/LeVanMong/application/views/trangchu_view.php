<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ đăng nhập</title>
	<script type="text/javascript" src="<?= base_url() ?>vendor/bootstrap.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
	
</head>
<body>
	
	<?php 
	include "navbartk_view.php" 
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				
			</div>
		</div><!--Hết row -->
	</div><!--Hết container-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
		       <div class="alert alert-success" role="alert" align="center">
		     	<strong><h1>Danh sách tài khoản account</h1></strong>
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
						<h4 class="card-title"><?= $value['Username'] ?></h4>
						<p class="card-text"><?= $value['Password'] ?></p>
						<a href="<?= base_url() ?>qltk/sua/<?= $value['id'] ?>" class="btn btn-outline-primary">Sữa</a>
						<a href="<?= base_url() ?>qltk/xoa/<?= $value['id'] ?>" class="btn btn-outline-danger">Xóa</a>
						
					</div>
				</div>
			</div><!--Hết col-4-->
		<?php endforeach ?>
		

</div>
</div>

   <div class="container">
		<div class="row">
			<div class="col-sm-6 push-sm-3">
				<!--<form method="POST" action="themtk">-->
  <div class="form-group">
    <label for="exampleInputEmail1">Tài khoản</label>
    <input id="Username" name="Username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên tài khoản">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mật khẩu</label>
    <input id="Password" name="Password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu">
  </div>
  
  <button type="button" class="btn btn-primary nutthem">Add</button>

  <script>
  	$('.nutthem').click(function(event) {
  		/* Act on the event */
  	$.ajax({
  		url: 'qltk/addAjax',
  		type: 'POST',
  		dataType: 'JSON',
  		data: {
  			Username:$('#Username').val(),
  			Password:$('#Password').val()
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
			noidung+='<h4 div class="card-title">'+$('#Username').val()+'</h4>';
			noidung+='<p div class="card-text">'+$('#Password').val()+'</p>'
			noidung+='<a href="<?= base_url() ?>qltk/sua/<?= $value["id"] ?>" class="btn btn-outline-primary">Change</a>';
			noidung+='<a href="<?= base_url() ?>qltk/xoa/<?= $value["id"] ?>" class="btn btn-outline-danger">Delete</a>';
			noidung+='</div>';
			noidung+='</div>';
			noidung+='</div><!--Hết col-4-->';
			$('.card-deck').append(noidung);		
	    });
  	});
  	
  </script>
</body>
</html>