<?php
$user=(isset($_POST['user']))? $_POST['user'] :"";
$usercheck='admin';
$pass=(isset($_POST['pass']))? $_POST['pass'] :"";
$passcheck='admin';
if((string)$usercheck===(string)$user&&(string)$passcheck===(string)$pass){
    header('Location: http://localhost/K3Office/views/Visa/view_select.php');
}
else{
    header('Location: http://localhost/K3Office/login.php');
}
?>