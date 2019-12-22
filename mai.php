 <!DOCTYPE html>
 <html>
 <head>
 	<title>Form Đăng ký</title>
 	<meta charset="utf-8">
 	<link href="view1.css" rel="stylesheet"/>
 </head>
 <body>
    <form action="" method="post" id="form">
    	<div>
    		<label for="name">Họ tên: </label>
    		<input type="text" name="name" id="name">
    	</div>
    	<div>
    		<label for="pass">Mật khẩu :</label>
    		<input type="password" name="pass">
    	</div>
    	<div>
    		<label for="email">Email :</label>
    		<input type="text" name="email" id="email">
    		<select name="email">
    			<option value="email">@yahoo.com</option>
    			<option value="gamil">@gmail.com</option>
    			<option value="email_vn">@yahoo.com.vn</option>
    			
    		</select>
    	</div>
    	<div>
    		<label for="gender">Giới tính :</label>
    		<input type="radio" name="gender">Nam
    		<input type="radio" name="gender">Nữ
    	</div>
    	<div>
    		<label for="jobs">Nghề nghiệp :</label>
    		<input type="text" name="jobs">
    		<select name="jobs">
    			<option value="hs-sv">Học sinh-Sinh viên</option>
				<option value="giao vien">Giáo viên</option>
				<option value="cong nhan">Công nhân</option>
				<option value="Kỹ sư">Kỹ sư</option>
    		</select>
    	</div>
    	<div>
    		<label for="notes">Ghi chú :</label>
    		<textarea name="notes" cols="40" rows="8"></textarea>
    	</div>
    	<div>
    		<input type="submit" value="Đăng ký" id="button">
    		<input type="submit" value="Làm lại" id="button">
    	</div>
    </form>
 </body>
 </html>