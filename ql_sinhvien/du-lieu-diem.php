<?php 
    include_once('config/config.php');
    $idhk = $_POST["idhk"];
    $masv = $_POST["masv"];
    $sql = "SELECT * FROM `diem` WHERE `ma_sinh_vien` = '$masv' and `id_hoc_ky` = '$idhk'";
    $qr = mysqli_query($conn, $sql);

    $sqlten = "SELECT `ten_sinh_vien` FROM `tai_khoan` WHERE `ten_tai_khoan` = '$masv'";
    $qrten = mysqli_query($conn, $sqlten);
    $rowten = mysqli_fetch_assoc($qrten);
    $tensv = $rowten["ten_sinh_vien"];
   ?>
<?php if(mysqli_num_rows($qr) > 0) {?>
<table class="table table-bordered table-responsive">
                 <tr class="chimuc">
                     <th>Tên Môn Học</th>
                     <th>Điểm Quá Trình</th>
                     <th>Điểm Thi</th>
                     <th>Điểm Học Phần</th>
                     <th>Điểm Chữ</th>
                     <th>Thang Điểm</th>
                 </tr>
                 <?php while($row = mysqli_fetch_assoc($qr)){?>
                 <tr>
                  <td><?php echo $row["ten_mon_hoc"]?></td>
                  <td><?php echo $row["diem_qua_trinh"]?></td>
                  <td><?php echo $row["diem_thi"]?></td>
                  <td><?php echo $row["diem_hoc_phan"]?></td>
                  <td><?php echo $row["diem_chu"]?></td>
                  <td><?php echo $row["thang_diem"]?></td>
                 </tr>
                 <?php } ?>
            </table>

          </div>
<?php } elseif($idhk == NULL){ ?>
      <div class="alert alert-warning fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <strong>ERROR!</strong> Vui lòng chọn Học Kỳ.
        </div>
<?php }
else { ?>
  <div class="alert alert-warning fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <strong>ERROR!</strong> Chưa có bảng điểm của kỳ này.
        </div>
<?php 
  } ?>
