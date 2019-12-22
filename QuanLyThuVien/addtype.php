<?php
require_once("incfiles/connect.php");
$type = $_POST['theloai'];
if (empty($type))
	echo'Không bỏ trống trường giá trị';
else 
{
	$result = mysql_query("INSERT INTO `theloai` (name) values ('".$type."')");
	if ($result)
	{
		echo'Thêm thành công
		<script type="text/javascript">
		window.location.reload(); 
		</script>
		';
	}
	else 
		echo'Lỗi query';
}



?>

