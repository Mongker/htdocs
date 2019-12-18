<!DOCTYPE html>
<html>
<head>
	<title>Giải phương trình bâc nhất</title>
	<meta charset="utf-8">
</head>
<body>
	<?php 
        $result = '';
		 if (isset($_POST['ketqua']))
			{
			    // Bước 1: Lấy thông tin
			    $a = isset($_POST['a']) ? (float)trim($_POST['a']) : '';
			    $b = isset($_POST['b']) ? (float)trim($_POST['b']) : '';
			 
			    // Bước 2: Validate thông tin và tính toán
			    if ($a == ''){
			        $result = 'Bạn chua nhập số a';
			    }
			    else if ($b == ''){
			        $result = 'Bạn chưa nhập số b';
			    }
			    else if ($a == 0){
			        $result = 'Số a phải nhập khác 0';
			    }
			    else {
			        $result = -($b) / $a;
			    }
			}
    ?>
	<h1>Giải phương trình bậc nhất</h1>
	<form method="post" action="">
            <input type="text" style="width: 20px" name="a" value=""/>x 
            +
            <input type="text" style="width: 20px" name="b" value=""/> = 0
            <br><br><input type="submit" name="ketqua" value="Kết quả">
        </form>
        <?php echo $result; ?>
   
</body>
</html>