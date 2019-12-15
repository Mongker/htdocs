<?php
require_once("incfiles/connect.php");

$id= $_POST['idbook'];
$name = $_POST['tensach'];
$sl = $_POST['soluong'];
$tacgia = $_POST['tacgia'];
$theloai = $_POST['theloai'];

if (empty($name))
	echo'Không bỏ trống các trường giá trị';
else 
	{
		$result = mysql_query("UPDATE dsbook SET  
			`namebook`= '".$name."',
			`soluong`= ".$sl.",
			`tacgia`= '".$tacgia."',
			`theloai`= ".$theloai."
			 where IDbook = ".$id." ");
		if ($result)
		{
			echo'
			<div class="alert alert-info alert-dismissible">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Thông Báo!</strong> Chỉnh sửa thành công.
			</div>
				 
		';
		}
		else 
		echo'Thất bại';
	}

?>