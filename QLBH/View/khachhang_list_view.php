<?php
	include_once('../Model/khachhang_list.php');
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	
</head>
<body>
	
	<table align="center" width="100%" style="vertical-align: middle; border: 1px;border-color:#e5e5e5;  background: #e5e5e5;">
		<tbody>
			<tr style="height: 50px; text-align: center; vertical-align:middle; background: #FF9900;">
				<td ><b>STT</b></td>
				<td ><b>MÃ KHÁCH HÀNG</b></td>
    			<td ><b>HỌ TÊN</b></td>
    			<td ><b>ĐỊA CHỈ</b></td>
    			<td ><b>SỐ ĐIỆN THOẠI</b></td>
			</tr>
			<?php
				$id=0;
				while ($row=mysqli_fetch_array($kq)) {
					$id+=1;
					echo "<tr style='background: #ffd4aa; height: 30px; vertical-align: middle;'>";
						echo "<td  style='text-align:center;'>".$id."</td>";
						echo "<td>".$row['makhachhang']."</td>";
						echo "<td>".$row['tenkhachhang']."</td>";
						echo "<td>".$row['diachi']."</td>";
						echo "<td>".$row['sodienthoai']."</td>";
					echo "</tr>";	
					# code...
				}
			?>
		</tbody>
	</table>
	<form method="" action="../QLBH_view.php"><input type="submit" name="btn_thoat" value="<Quay lại"></form>
</body>
</html>