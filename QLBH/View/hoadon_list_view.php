<?php
	include_once('../Model/hoadon_list.php');
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">
		.auto1{
			width: 10%;
		}
		.auto2{
			width: 20%;
		}
		.auto3{
			width: 50%;
		}
	</style>
</head>
<body>
	
	<table align="center" width="100%" style="vertical-align: middle; border: 1px;border-color:#e5e5e5;  background: #e5e5e5;">
		<tbody>
			<tr style="height: 50px; text-align: center; vertical-align:middle; background: #FF9900;">
				<td ><b>STT</b></td>
				<td ><b>SỐ HÓA ĐƠN</b></td>
    			<td ><b>NGÀY LẬP HĐ</b></td>
    			<td ><b>MÃ KHÁCH HÀNG</b></td>
    			<td ><b>MÃ NHÂN VIÊN</b></td>
    			<td ><b>MÃ SẢN PHẨM</b></td>
    			<td ><b>SỬA</b></td>
    			<td ><b>XÓA</b></td>
			</tr>
			<?php
				$id=0;
				while ($row=mysqli_fetch_array($kq)) {
					$id+=1;
					echo "<tr style='background: #ffd4aa; height: 30px; vertical-align: middle;'>";
						echo "<td style='text-align:center;'>".$id."</td>";
						echo "<td>".$row['sohoadon']."</td>";
						echo "<td>".$row['ngay']."</td>";
						echo "<td>".$row['makhachhang']."</td>";
						echo "<td>".$row['manhanvien']."</td>";
						echo "<td>".$row['masanpham']."</td>";
						echo "<td><a href='../Controller/update/update_hoadon'>Sửa</a></td>";
	          		    echo "<td><a href='../Controller/delete/delete_hoadon.php'>Xóa</a></td>";
					echo "</tr>";	
					# code...
				}
			?>
		</tbody>
	</table>
	<form method="" action="../QLBH_view.php"><input type="submit" name="btn_thoat" value="<Quay lại"></form>
</body>
</html>