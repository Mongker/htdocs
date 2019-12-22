<?php
	$title = "Đăng Nhập - ";
	include_once('../header.php');
 ?>
<div class="container">
<div class="row" style="margin-top:10%;">
  <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
  	<div id="thongbaodn"></div>
    <div class="panel panel-default">
      <div class="panel-body">

          <fieldset>
            <div class="row">
              <div class="center-block"> Đăng Nhập Tài Khoản </div>
              <hr>
            </div>
            <div class="row">
            <form method="GET" action="javascript:;">
              <div class=" col-xs-12 col-sm-12 col-md-12  col-lg-12">
                <div class="form-group">
                <div class="form-group">
                <label>Tài Khoản:</label>
                  <div class="input-group"> <span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i> </span>
                    <input class="form-control" placeholder="Tài Khoản..." id="taikhoanlg" type="text" autofocus="autofocus">
                  </div>
                </div>
                <div class="form-group">
                 <label>Mật Khẩu:</label>
                  <div class="input-group"> <span class="input-group-addon"> <i class="glyphicon glyphicon-lock"></i> </span>
                    <input class="form-control" placeholder="Mật Khẩu..." id="matkhaulg" type="password">
                  </div>
                </div>
               
                <div class="form-group">
                 	<label>
                  	<input type="checkbox" checked="checked"> Lưu đăng nhập
                  	</label> 
                  	<center>
                  		<input type="submit" id="dangnhaptk" class="btn btn-primary" value="ĐĂNG NHẬP">
                  	</center>
                </div>
               
              </div>
              </form>
            </div>
           
          </fieldset>
    
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
 <?php 
	include_once('../footer.php');
 ?>