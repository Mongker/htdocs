<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm bệnh nhân</title>
	<script type="text/javascript" src="<?= base_url() ?>vendor/bootstrap.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
</head>
<body>
	 <div class="container">
     <div class="text-xs-center">
      <h3 class="display-3"  style="text-align: center;">Thêm bệnh nhân</h3><!-- hết display-3  -->
     </div> <!-- hết text-xs-center -->
   </div> <!-- hết container -->
    
    <form method="post" enctype="multipart/form-data" action="/QLHSBA/login/them">

      <div class="form-group row">
        <label for="ten" class="col-sm-4 from form-control-label text-xs-right">Tên bênh nhân : </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="tenbenhnhan" id="tenbenhnhan" placeholder="Tên bệnh nhân">
        </div>
      </div> <!-- hết form-group row -->

      <div class="form-group row">
        <label for="tuoi"  class="col-sm-4 from form-control-label text-xs-right">Tuổi:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="tuoi" id="tuoi" placeholder="Tuổi ">
        </div>
      </div> <!-- hết form-group row -->

      <div class="form-group row">
        <label for="sdt" class="col-sm-4 from form-control-label text-xs-right">Số điện thoại:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name=sdt id="sdt" placeholder="Số điện thoại">
        </div>
      </div> <!-- hết form-group row -->
      
      <div class="form-group row">
        <label for="ten" class="col-sm-4 from form-control-label text-xs-right"> Ngày Sinh : </label>
        <div class="col-sm-6">
          <input type="date" class="form-control" name="ngaysinh" id="ngaysinh" placeholder="Ngày Sinh">
        </div>
      </div> <!-- hết form-group row -->
      <div class="form-group row">
        <label for="ten" class="col-sm-4 from form-control-label text-xs-right"> Số CMT : </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="cmt" id="cmt" placeholder="Số Chứng Minh Thư">
        </div>
      </div> <!-- hết form-group row -->
      <div class="form-group row">
        <label for="ten" class="col-sm-4 from form-control-label text-xs-right"> Quê Quán : </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="diachi" id="diachi" placeholder="Quê Quán">
        </div>
      </div> <!-- hết form-group row -->
      <div class="from-group row text-xs-right">
       <div class="col-sm-3 mx-auto">
           <button type="submit" class="btn btn-primary themmoi">Thêm mới</button>
           <button type="refresh" class="btn btn-warning ">Nhập lại</button>
       </div>  <!-- hết col-sm-6 --> 
      </div> <!-- hết from-group row text-xs-right -->
     
    </form><!--  hết from -->
   </div><!-- hết container -->
</body>
</html>