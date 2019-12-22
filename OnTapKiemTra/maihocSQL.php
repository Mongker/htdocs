<!DOCTYPE html>
<html>
<head>
	<title>Thông tin sinh viên</title>
	<meta charset="utf-8">
<body>
	<?php 
	// Khởi tạo các biến để chuẩn bị liên kết vs SQL 
    $server='localhost';	 //1
    $username='root';		 //2
    $password='';			 //3
    $dbname='utt'; 			//4
    //lien ket toi sql
    $connect=new mysqli($server, $username, $password, $dbname);
    if($connect->connect_error){
    	die("Khong the ket noi".$connec->connect_error);
    	exit();
    }else {
    	echo 'Thanh cong' ;
    }

	//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi


	$hoten='';
	$ngaysinh='';
	$diachi='';

	if($_SERVER['REQUEST_METHOD']==='POST'){
			if(isset($_POST['hoten'])){
				$hoten	=	$_POST['hoten'];
			}
			if(isset($_POST['ngaysinh'])){
				$ngaysinh	=	$_POST['ngaysinh'];
			}
			if(isset($_POST['diachi'])){
				$diachi	=	$_POST['diachi'];
			}
	}
    
    $sql ="INSERT INTO thongtinsv ( hoten , ngaysinh , diachi) 
    VALUES (N'$hoten' , '$ngaysinh' ,N'$diachi')";

    if ($connect->query($sql) === TRUE) {
        echo "Thêm dữ liệu thành công";
    } 
    $connect->close();
	?>


    <form action="" method="post">
    	<table >
    		
    		<tr>
    			<th>Họ tên:</th>
    			<td><input type="text" name="hoten" ></td>
    		</tr>
    		<tr>
    			<th>Ngày sinh:</th>
    			<td><input type="date" name="ngaysinh" ></td>
    		</tr>
    		<tr>
    			<th>Địa chỉ:</th>
    			<td><input type="text" name="diachi" ></td>
    		</tr>
    		<tr>
    			<th></th>
    			<td><button type="submit">Thêm</button></td>
    		</tr>
    	</table>
    </form>
    <!-- Xóa trong SQL -->

</body>
</html>