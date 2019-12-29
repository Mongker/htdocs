<?php
//xóa
require ('data.php');
$sql_delete="";
$sql_delete = "DELETE FROM K3OfficeExcel WHERE id= ".$id;
// echo $sql_delete;
if ($conn->query($sql_delete) === TRUE) {
   require ('../views/QuayLai.html');
} else {
echo "Error deleting record: " . $conn->error;
}
?>
