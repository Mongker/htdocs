<!DOCTYPE html>
<html>
<head>
	<title>Form đăng ký</title>
	<meta charset="utf-8">
</head>
<body>
	<h1 style="color: red" align="center">FORM ĐĂNG KÝ</h1>
     <form action="insert.php" method="post" enctype="multipart/form-data">
     	<!-- enctype="multipart/form-data -->
     	<table border="2" align="center">
     		<tr  >
     			
     			<td colspan="2" align="center"><b>ĐĂNG KÝ</b></td>
     		</tr>
     		<tr>
     			<td colspan="1">Full name</td>
     			<td ><input type="text" name="fullname" placeholder="Nhập full name"></td>
     		</tr>
     		<tr>
     			<td colspan="1">username</td>
     			<td ><input type="text" name="username" placeholder="Nhập tên"></td>
     		</tr>
     		<tr>
     			<td colspan="1">Password</td>
     			<td ><input type="password" name="password" placeholder="Nhập mật khẩu"></td>
     		</tr>
     		<tr>
     			<td>Nhập lại Password</td>
     			<td><input type="password" name="repassword" placeholder="Nhập lại mât khẩu"></td>
     		</tr>
     		<tr>
     			<td>Giới tính</td>
     			<td>
     				<input type="radio" name="sex" value="Nam">Nam
     				<input type="radio" name="sex" value="Nữ">Nữ
     			</td>
     		</tr>
     		<tr>
     			<td>Ngày sinh</td>
     			<td><input type="date" name="birthday"></td>
     		</tr>
     		<tr>
     			<td>Địa chỉ</td>
     			<td><textarea name="address"></textarea></td>
     		</tr>
     		<tr>
     			<td>Avarta</td>
     			<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
     		</tr>
     		<tr>
     			<td>Sở thích</td>
     			<td>
     				<input type="checkbox" name="sothich[]" value ="Xem phim">Xem phim
     				<input type="checkbox" name="sothich[]" value="Thể thao">Thể Thao
     				<input type="checkbox" name="sothich[]" value="Web">Web
     			</td>
     		</tr>
     		<tr>
     			<td align="center" colspan="2"><input type="submit" name="ok" value="OK">
     			<input type="reset" name="reset" value="Reset"></td>
     		</tr>
     	</table>
     </form>
</body>
</html>