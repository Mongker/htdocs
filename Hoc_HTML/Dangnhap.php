<!DOCTYPE html>
<html>
<head>
	<title>Form đăng nhập</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="post" action="trangchu.php">
		<table>
			<tr ><td colspan="2" align="center"><b>THÔNG TIN ĐĂNG NHẬP</b></td></tr>
			<tr>
			    <td> User Name :</td>
			    <td><input type="text" name="username" id="username"></td>
		    </tr>
		    <tr>
		    	<td> PASS WORD : </td>
		    	<td><input type="password"  name="password" id="password"></td>
		    </tr>
		    <tr>
		    	 <td ><input type="submit" value="Đăng nhập"></td>
		         <td><input type="reset" value="Nhập lại "></td>
		    </tr>
		</table>		   
	</form>
</body>
</html>