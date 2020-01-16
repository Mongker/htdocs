<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>THÊM MỚI SINH VIÊN</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

	<?php 

	    $hoten=(isset($_POST['hoten']))?$_POST['hoten']:"";
	    $ngaysinh=(isset($_POST['ngaysinh']))?$_POST['ngaysinh']:"";
	    $gioitinh=(isset($_POST['gioitinh']))?$_POST['gioitinh']:"";
	    $diachi=(isset($_POST['diachi']))?$_POST['diachi']:"";
	    $khoaid=(isset($_POST['khoaid']))?$_POST['khoaid']:"";
	    $lopid=(isset($_POST['lopid']))?$_POST['lopid']:"";
	    $email=(isset($_POST['email']))?$_POST['email']:"";
	    $sodt=(isset($_POST['sodt']))?$_POST['sodt']:"";
	    $xaid=(isset($_POST['xaid']))?$_POST['xaid']:"";
	    $huyenid=(isset($_POST['huyenid']))?$_POST['huyenid']:"";
	    $tinhid=(isset($_POST['tinhid']))?$_POST['tinhid']:"";

		$conn = new mysqli("localhost","root","","qlsvl02");
		  if ($conn-> connect_error) {
		  	die("connection failed".$conn-> connect_error);
		  }
		  mysqli_query($conn,"SET CHARACTER  SET 'utf8'");
	    if(isset($_POST["them"])){
	    	$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        // echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        // echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			// if (file_exists($target_file)) {
			//     // echo "Sorry, file already exists.";
			//     $uploadOk = 0;
			// }
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    // echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    // echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        // echo "Sorry, there was an error uploading your file.";
			    }
			}
			$imagePath=$target_dir.basename($_FILES["fileToUpload"]["name"]);
			if (!$danhmucidlop||!danhmucidkhoa||!$hoten||!ngaysinh||!gioitinh) {
				echo "<a href='javascript :history.go(-1)'>Có lỗi ,quay lại</a>";
				exit;
			}
			$sql="INSERT INTO 'sinhvien'('id','hoten','danhmucidlop','ngaysinh','gioitinh','danhmucidkhoa','anh','diachi','sodt','email') VALUES(NULL,'$hoten','$danhmucidlop','$ngaysinh','$gioitinh','$danhmucidkhoa','$imagePath','$diachi','$sodt','$email')";
			$kq=mysqli_query($conn,$sql);
			if($kq){
			echo '<script type="text/javascript">alert("Thêm mới thành công!");</script>';}
	    }

	    
	?>
 
<body>

	<div class="connection">
		<div class="row">
			<div class="col-sm-12">
				<div class="jumbotron">
					<h1 class="display-3"><center>Thêm mới sinh viên</center></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 offset-sm-3"><!--  go b4:form_controls -->
				<form name="frmAddStudent" method="post" encntype="multipart/form-data">
					<fieldset class="form-group">
						<label>Họ tên :</label>
						<input type="text" name="hoten" class="form-control" placeholder="Nhập họ tên" value="<?= $hoten ?>">
					</fieldset>
				  
					<fieldset class="form-group">
						<label>Ngày sinh :</label>
						<input type="date" name="ngaysinh" class="form-control" placeholder="Nhập ngaysinh" value="<?= $ngaysinh ?>">
					</fieldset>
					<label>Giới tính :</label>
					<?php  
					if($gioitinh=="Nam"){
						echo '<div class="radio">
						 <label>
							<input type="radio" name="gioitinh" value="Nam" checked >Nam
						</label> </div> ';
						echo'<div class="radio">
						<label>
							<input type="radio" name="gioitinh" value="Nữ">Nữ
						</label> </div>';
					}else {
						echo '<div class="radio">
						 <label>
							<input type="radio" name="gioitinh" value="Nam"  >Nam
						</label> </div> ';
						echo'<div class="radio">
						<label>
							<input type="radio" name="gioitinh" value="Nữ" checked>Nữ
						</label> </div>';
					}
						?>
					
					
					<fieldset class="form-group">
					    <label for="exampleFormControlSelect1">Khoa:</label>
					    <select name="khoaid" class="form-control" onChange="frmAddStudent.submit();">
					      <?php 

					          $sql="SELECT*FROM khoa";
					          $kq=mysqli_query($conn,$sql);
					          mysqli_query($conn,"SET CHARACTER  SET 'utf8'");
					          while ($row=mysqli_fetch_array($kq)) {
					          	if($row['khoaid']==$khoaid){
						          		echo "<option value=".$row['khoaid']." selected >".$row['khoa']."</option>";

						          	}else {
						          		echo "<option value=".$row['khoaid'].">".$row['khoa']."</option>";
						          	}
					              
					          }

					       ?>
					    </select>
					  </fieldset>
					  <fieldset class="form-group">
					    <label for="exampleFormControlSelect1">Lớp:</label>
					    
					       <?php 
						          $sql="SELECT*FROM lop WHERE khoaid=".$khoaid;
						          // echo 'sql lop :'.$sql;
						          echo '<select name="lopid" class="form-control" >';
						          $kq=mysqli_query($conn,$sql);
						          while ($row=mysqli_fetch_array($kq)) {
						          	if($row['lopid']==$lopid){
						          		echo "<option value=".$row['lopid']." selected >".$row['lop']."</option>";

						          	}else {
						          		echo "<option value=".$row['lopid'].">".$row['lop']."</option>";
						          	}
					              
						          	
						          		
						          	}
						             
						          
						          echo '</select>';

						       ?>
					   
					  </fieldset>
					  <div class="form-group">
					    <label for="exampleFormControlFile1">Ảnh :</label>
					    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
					<fieldset class="form-group">
						<label>Địa chỉ :</label>
						<div class="form-row">
						 <div class="form-group col-md-4">
					      <label for="inputState">Tỉnh</label>
						      <select name="tinhid" class="form-control" onChange="frmAddStudent.submit();">
						      <?php 
						          $sql="SELECT*FROM tinh";
						          $kq=mysqli_query($conn,$sql);
						          while ($row=mysqli_fetch_array($kq)) {
						          	if($row['provinceid']==$tinhid){
						          		echo "<option value=".$row['provinceid']." selected >".$row['name']."</option>";

						          	}else {
						          		echo "<option value=".$row['provinceid'].">".$row['name']."</option>";
						          	}
						            }
						          

						       ?>
					    </select>
					    </div>
					    <div class="form-group col-md-4">
					      <label for="inputState">Huyện</label>
					      <select name="huyenid" class="form-control" onChange="frmAddStudent.submit();">
						      <?php 
						          $sql="SELECT*FROM huyen WHERE provinceid=".$tinhid;
						          $kq=mysqli_query($conn,$sql);
						          while ($row=mysqli_fetch_array($kq)) {
						          	if($row['districtid']==$huyenid){
						          		echo "<option value=".$row['districtid']." selected >".$row['name']."</option>";

						          	}else {
						          		echo "<option value=".$row['districtid'].">".$row['name']."</option>";
						          	}
						            }
						          
						              
						          

						       ?>
					    </select>
					    </div>
					    <div class="form-group col-md-4">
					      <label for="inputState">Xã</label>
					      <select name="xaid" class="form-control" onChange="frmAddStudent.submit();">
						      <?php 
						          $sql="SELECT*FROM xa WHERE districtid=".$huyenid;
						          $kq=mysqli_query($conn,$sql);
						          while ($row=mysqli_fetch_array($kq)) {
						          	 	if($row['wardid']==$xaid){
						          		echo "<option value=".$row['wardid']." selected >".$row['name']."</option>";

						          	}else {
						          		echo "<option value=".$row['wardid'].">".$row['name']."</option>";
						          	}
						             
						          }

						       ?>
					    </select>
					    </div>
					        <!-- Please provide a valid zip. -->
					   </div>
					</fieldset>
					  
					<fieldset class="form-group row">
					    <label for="colFormLabel" class="col-sm-2 col-form-label">Số điện thoại</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="" placeholder="Nhập số điện thoại" value="<?= $sodt ?>">
					    </div>
				  	</fieldset>
					
                    <fieldset class="form-group row">
					    <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
					    <div class="col-sm-10">
					      <input type="email" class="form-control" id="colFormLabel" placeholder="Nhập email" value="<?= $email ?>">
					    </div>
				  	</fieldset>
				  	
				  	<div class="form-row">
				  	<div class="form-group ">
					    <div class="col-sm-10">
					      <button type="submit" class="btn btn-primary" name="them">Thêm mới</button>
					    </div>

					  </div>
					  <div class="form-group ">
					    <div class="col-sm-10">
					      <button type="reset"  class="btn btn-primary">Reset</button>
					    </div>
					  </div>
					  </div>

				</form>
				
		</div><!-- hết row -->
	</div><!-- het container -->

	</form> 

</body>
</html>