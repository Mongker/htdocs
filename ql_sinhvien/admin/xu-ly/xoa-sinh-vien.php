<?php 
	include_once('../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `tai_khoan` WHERE `tai_khoan`.`id_tai_khoan` = $id";
	mysqli_query($conn, $sql);
?>