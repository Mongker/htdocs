<?php
require_once("incfiles/connect.php");

$id= $_POST['idtype'];
$name= $_POST['theloai'];

if (empty($name))
	echo'Không bỏ trống các trường giá trị';
else 
	{
		$result = mysql_query("UPDATE theloai SET  `name`= '".$name."' where ID = ".$id." ");
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