<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh sách bệnh nhân</title>
	<script src="https://kit.fontawesome.com/737ddb1b73.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?= base_url() ?>vendor/bootstrap.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
</head>
<body>
	<?php 
	include "navbar_view.php" 
	?>
	<div class="container">
		
	<table align="center" width="100%" style="vertical-align: middle; border: 1px;border-color:#e5e5e5;  background: #e5e5e5;">
		<tbody>
			<tr style="height: 50px; text-align: center; vertical-align:middle; background: #FF9900;">
				<td ><b>ID</b></td>
				<td ><b>Tên Bệnh nhân</b></td>
    			<td ><b>Tuổi</b></td>
    			<td ><b>Ngày Sinh</b></td>
    			<td ><b>Quê Quán</b></td>
    			<td ><b>Số CMT</b></td>
    			<td ><b>Số Điện Thoại</b></td>
    			<td ><b>Sửa</b></td>
    			<td ><b>Xóa</b></td>
			</tr>
			<?php foreach ($dsbenhnhan as $value): ?>
				<tr style='background: #ffd4aa; height: 30px; vertical-align: middle;'>
					<td align="center"><?= $value['id'] ?></td>
					<td align="center"><?= $value['tenbenhnhan'] ?></td>
					<td align="center"><?= $value['tuoi'] ?></td>
    				<td align="center"><?= $value['ngaysinh'] ?></td>
    				<td align="center"><?= $value['diachi'] ?></td>
    				<td align="center"><?= $value['cmt'] ?></td>
    				<td align="center"><?= $value['sdt'] ?></td>
    				<td align="center"> 
    					<a href="<?php echo base_url() ?>login/sua_dsbn/<?= $value['id'] ?>">
                              <i class="fas fa-user-edit"></i>
                         </a></td>
    				<td align="center"><a href="<?php echo base_url() ?>login/xoa_dsbn/<?= $value['id'] ?>">  
                              <i class="fas fa-trash-alt"></i>
                        </a></td>
				</tr>
			<?php endforeach  ?>
		</tbody> 
	</table> 
	</div> <!-- hết container -->
</body>
</html>