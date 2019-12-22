<!DOCTYPE html>
<html lang="en"><head>
	<title>Web Bán Hàng </title>
	<meta charset="utf-8">
  <meta http-equiv="refresh" content="120 url=<?php echo base_url() ?>nhansu/" >
	<meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/737ddb1b73.js" crossorigin="anonymous"></script>
 <!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>
<body >
   <div class="container">
   	 <div class="text-xs-center">
   	 	<h3 class="display-3" style="text-align: center;"> Danh sách nhân sự	</h3><!-- hết display-3  -->
   	 </div> <!-- hết text-xs-center -->
   </div> <!-- hết container -->
   <div class="container">
   	<div class="row">
        <div class="card-deck">
        <!-- Viết nhanh :foreach + tab  -->
        <?php foreach ($mangketqua as $value): ?> 
          <div class="col-sm-4">
           <div class="card">
           <img class="card-img-top img-fluid " src="<?= $value['anhavatar'] ?>">
               <div class="card-block">
                    <div class="card-title ">Tên : <strong><?= $value['ten'] ?></strong></div>
                    <div class="card-text  tuoi">Tuổi: <b><?= $value['tuoi'] ?></b></div>
                    <div class="card-text  sdt">Số điện thoại :<b> <?= $value['sdt'] ?></b></div>
                    <div class="card-text  linkfb" style="text-align: center;">
                       <a href="<?= $value['linkfb'] ?>">
                        <button type="button" class="btn btn-info" >Facebook  
                          <i class="fab fa-facebook"></i>
                        </button>
                       </a>
                    </div> <!-- hết card-text text-center linkfb --> 
                       <div class="card-text " style="text-align: center;">
                         <a href="<?php echo base_url() ?>nhansu/sua_nhansu/<?= $value['id'] ?>">
                            <button type="button" class="btn btn-warning" >Sữa   
                              <i class="fas fa-user-edit"></i> </button>
                         </a>
                         <a href="<?php echo base_url() ?>nhansu/xoa_nhansu/<?= $value['id'] ?>">
                            <button type="button" class="btn btn-danger" > Xóa
                              <i class="fas fa-trash-alt"></i>
                             </button>
                        </a>
                       </div> <!-- card-text text-center  -->
               </div>  <!-- card-block -->
        </div>  <!-- card -->
      </div>  <!-- col-sm-4 -->
        <?php endforeach ?>  
       </div>  <!-- card-deck-wrapper -->
   	</div> <!-- hết row -->
   <div class="container">
     <div class="text-xs-center">
      <h3 class="display-3"  style="text-align: center;">Thêm danh sách bệnh nhân</h3><!-- hết display-3  -->
     </div> <!-- hết text-xs-center -->
   </div> <!-- hết container -->
    
    <form method="post" enctype="multipart/form-data" action="/WebBanHang/nhansu/nhansu_add">
      <div class="form-group row">
        <label for="ten" class="col-sm-4 from form-control-label text-xs-right">Tên bệnh nhân : </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="ten" id="ten" placeholder="Tên nhân viên">
        </div>
      </div> <!-- hết form-group row -->

      <div class="form-group row">
        <label for="tuoi"  class="col-sm-4 from form-control-label text-xs-right">Tuổi :</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="tuoi" id="tuoi" placeholder="Tuổi nhân viên">
        </div>
      </div> <!-- hết form-group row -->

      <div class="form-group row">
        <label for="sdt" class="col-sm-4 from form-control-label text-xs-right">Số điện thoại:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name=sdt id="sdt" placeholder="Số điện thoại">
        </div>
      </div> <!-- hết form-group row -->
      
      <div class="form-group row">
        <label for="ten" class="col-sm-4 from form-control-label text-xs-right"> Quê Quán : </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="linkfb" id="linkfb" placeholder="Link Facebook ">
        </div>
      </div> <!-- hết form-group row -->
      <div class="form-group row">
        <label for="ten" class="col-sm-4 from form-control-label text-xs-right"> Số CMT : </label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="linkfb" id="linkfb" placeholder="Link Facebook ">
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