<?php
// $id=(isset($_GET['id']))?$_GET['id']:0;
$dauthe =(isset($_POST['dauthe']))? $_POST['dauthe'] :"";
$ngaylam=(isset($_POST['ngaylam']))? $_POST['ngaylam']:"";
$khachhang=(isset($_POST['khachhang']))? $_POST['khachhang']:"";
$sothe=(isset($_POST['sothe']))? $_POST['sothe']:"";
$sotien=(isset($_POST['sotienlam']))? $_POST['sotienlam']:"";
$sotienlam=(float)$sotien*1000000;
$nht=(isset($_POST['nht']))? $_POST['nht']:"";
$kh=(isset($_POST['kh']))? $_POST['kh']:"";
$psum=((float)$kh*(float)$sotienlam);
$ptnh=(((float)$sotienlam*(float)$nht)/100);
$ptkh=((float)$psum-(float)$ptnh);
?>
<?php require('database.php') ?>
<?php
//insert dữ liệu
$sql_insert="insert into Visa values(null,'".$dauthe."','".$ngaylam."','".$khachhang."','".$sothe."','".$sotienlam."','".$nht."','".$kh."','".$psum."','".$ptnh."','".$ptkh."')";
if ($khachhang!=''&&$sotienlam!=''&&$ngaylam!=''){
    if($conn->query($sql_insert)){
        header('Location: http://localhost/K3Office/views/Visa/view_select.php');
    }


//    echo' <script type="text/javascript">alert("Thêm mới thành công !");</script>';
}
$conn->close();

?>
