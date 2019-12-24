
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">
		.auto1{
			width: 100px;
		}
		.auto2{
			padding-left: 20px;
			width: 500px;
		}
		.auto4{
			width: 100px;
			text-align: center;
		}
		.dz{
			width: 800px;
			margin: auto;
			padding-top: 20px;
		}
		#tk{
			width: 500px;
			padding-bottom: 20px;
		}
		a{
			text-decoration: none;
			text-align: center;
			color: black;

		}
		.add{
			padding-top: 20px;
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="dz">
		<form action="lophoc_find_view.php" method="post" id="tk">
			<input type="text" name="find" id="" placeholder="nhập lớp học">
			<input type="submit" name="timkiem" value="Tìm kiếm">
		</form>
	<table align="center" width="100%" style="vertical-align: middle; border: 1px;border-color:#e5e5e5;  background: #e5e5e5;">
		<tbody>
			<tr style="height: 50px; text-align: center; vertical-align:middle; background: #aaaaff;">
				<td class="auto1" ><b>STT</b></td>
    			<td class="auto2"><b>TÊN LỚP</b></td>
    			<td class="auto4"><b>SỬA</b></td>
    			<td class="auto4"><b>XÓA</b></td>
			</tr>
			<?php
				$id=0;
				include_once('../Publish/connect.php');
				$sql="SELECT * FROM lophoc";
				$kq=mysqli_query($conn,$sql);
				while ($row=mysqli_fetch_array($kq)) {
					$id ++;
					$malop=$row['malop'];

					echo "<tr style='background: #ffd4aa; height: 30px; vertical-align: middle;'>";
						echo "<td class='auto1' style='text-align:center;'>".$id."</td>";
						echo "<td class='auto2'>".$row['tenlop']."</td>";
						
						echo "<td class='auto4'><a href='../Controller/Lophoc_update.php?malop=".$malop."'><img src='../image/edit.gif'>";
						echo "<td class='auto4'></a><a href='../Model/Lophoc_delete.php?malop=".$malop."'><img src='../image/delete.gif'></a></td>";
					echo "</tr>";	
					# code...
				}
			?>
		</tbody>
	</table>
	<div class="add">
	<button><a href="../Controller/add_lophoc.php">ADDDDDD</a></button>
	</div>
	</div>
</body>
</html>