<?php
require_once("incfiles/connect.php");
$name = $_POST['tensach'];
$sl = $_POST['soluong'];
$tacgia = $_POST['tacgia'];
$theloai = $_POST['theloai'];

if (empty($name) || empty($sl) || empty($tacgia) || empty($theloai))
	echo'Không bỏ trống các trường giá trị';
else 
	{
		$result = mysql_query("INSERT INTO `dsbook` (namebook,theloai,tacgia,soluong) 
		values ('".$name."',".$theloai.",'".$tacgia."',".$sl.")");
		if ($result)
		{
			echo'Thêm thành công
				<script type="text/javascript">
		window.location="viewlistbook.php?id='.$theloai.'"
		</script>';
		}
		else 
		echo'Thất bại';
	}


?>
