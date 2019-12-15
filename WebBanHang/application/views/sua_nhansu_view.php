<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa Nhân Sự</title>
	<meta http-equiv="refresh" content="120 url=<?php echo base_url() ?>/nhansu/" >
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="		sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  	<script src="https://kit.fontawesome.com/737ddb1b73.js" crossorigin="anonymous"></script>
</head>
<body>
   
   <div class="container">
     <div class="text-xs-center">
      <h3 class="display-3"  style="text-align: center;">Sửa nhân sự </h3><!-- hết display-3  -->
     </div> <!-- hết text-xs-center -->
   </div> <!-- hết container -->
    
    <form method="post" enctype="multipart/form-data" action="/WebBanHang/nhansu/update_nhansu">
    <?php foreach ($dulieuketqua as $value): ?>
      <div class="form-group row">
        <label for="anh" class="col-sm-4 from form-control-label text-xs-right">Ảnh đại diện :</label>
        <div class="col-sm-6">
        	<div class="row">
        		<div class="col-sm-6">
        			<img src="<?= $value['anhavatar'] ?>" alt = "" class="img-fluid">
        		</div>
        	</div>
          <input type="hidden" name="id" value="<?= $value['id'] ?>">
          <input type="hidden" name="anhavatar2" value="<?= $value['anhavatar'] ?>">
          <input name="anhavatar" type="file" class="form-control-file" name="anhavatar" id="anhavatar" placeholder="Upload Avatar">
        </div>
        
      </div> <!-- hết form-group row -->

      <div class="form-group row">
        <label for="ten" class="col-sm-4 from form-control-label text-xs-right">Tên nhân viên : </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="ten" id="ten" value="<?= $value['ten'] ?>">
        </div>
      </div> <!-- hết form-group row -->

      <div class="form-group row">
        <label for="tuoi"  class="col-sm-4 from form-control-label text-xs-right">Tuổi nhân viên:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="tuoi" id="tuoi" value="<?= $value['tuoi'] ?>">
        </div>
      </div> <!-- hết form-group row -->

      <div class="form-group row">
        <label for="sdt" class="col-sm-4 from form-control-label text-xs-right">Số điện thoại:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name=sdt id="sdt" value="<?= $value['sdt'] ?>">
        </div>
      </div> <!-- hết form-group row -->
      
      <div class="form-group row">
        <label for="ten" class="col-sm-4 from form-control-label text-xs-right"> Link Facebook : </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="linkfb" id="linkfb" value="<?= $value['linkfb'] ?> ">
        </div>
      </div> <!-- hết form-group row -->
  

      <div class="from-group row text-xs-right">
       <div class="col-sm-3 mx-auto">
           <button type="submit" class="btn btn-primary">Lưu mới</button>
       </div>  <!-- hết col-sm-6 --> 
      </div> <!-- hết from-group row text-xs-right -->
      <?php endforeach ?>
    </form> <!-- hết from -->
   </div><!-- hết container -->
   
	
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>