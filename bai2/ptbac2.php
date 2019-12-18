<!DOCTYPE html>
<html>
<head>
	<title>Giải phương trình bậc 2</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Giải phương trình bậc 2</h1>
	<?php 
	 $result='';
	  if (isset($_POST['ketqua'])) {
	  	// bước 1 : lấy thông tin
	  	$a=isset($_POST['a']) ? $_POST['a']:'';
	  	$b=isset($_POST['b']) ? $_POST['b']:'';
	  	$c=isset($_POST['c']) ? $_POST['c']:'';

	  	//bước 2 : tính denta và giải phương trình
	  	$denta=($b*$b)-(4*$a*$c);
	  	if ($denta<0) {
	  		$result= 'Phương trình vô nghiệm ';
	  	}
	  	else if($denta==0){
	  		$result=' Phương trình có  nghiệm kép:<br> x1=x2='.(-$b/2*$a);
	  	}
	  	else {
        $result = 'Phương trình có hai nghiệp phân biệt:<br> x1 = ' . ((-$b + sqrt($delta))/2*$a);
        $result .= '<br> x2 = ' . ((-$b - sqrt($delta))/2*$a);
    }
	  }
	 ?>
	 <form method="post" action="">
	 	<input type="text" style="width: 20px" name="a">x <sup>2</sup>
	 	+
	 	<input type="text" style="width: 20px" name="b">x
	 	+
	 	<input type="text" style="width: 20px" name="c">=0
	 	<br><br><input type="submit" name="ketqua" value="Kết quả">

	 </form>
	 <?php 
	 echo $result;
	  ?>

</body>
</html>