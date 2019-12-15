<!-- <?php
 
// Bước 1: 
// Lấy dữ liệu từ database
$data = array(
     [0] => Array
        (
            [id_mon_hoc] => 1
            [ma_mon_hoc] => TDC
            [ten_mon_hoc] => Toán Đại Cương
            [so_tin_chi] => 3
            [id_hoc_ky] => 1
            [ten_lop] => TT1D13
        )

    [1] => Array
        (
            [id_mon_hoc] => 2
            [ma_mon_hoc] => THDC
            [ten_mon_hoc] => Tin Học Đại Cương
            [so_tin_chi] => 3
            [id_hoc_ky] => 1
            [ten_lop] => TT1D13
        )
);
// Bước 2: Import thư viện phpexcel
require '../PHPExcel.php';
 
// Bước 3: Khởi tạo đối tượng mới và xử lý
$PHPExcel = new PHPExcel();
 
// Bước 4: Chọn sheet - sheet bắt đầu từ 0
$PHPExcel->setActiveSheetIndex(0);
 
// Bước 5: Tạo tiêu đề cho sheet hiện tại
$PHPExcel->getActiveSheet()->setTitle('Email List');
 
// Bước 6: Tạo tiêu đề cho từng cell excel, 
// Các cell của từng row bắt đầu từ A1 B1 C1 ...
$PHPExcel->getActiveSheet()->setCellValue('A1', 'STT');
$PHPExcel->getActiveSheet()->setCellValue('B1', 'Email');
$PHPExcel->getActiveSheet()->setCellValue('C1', 'Fullname');
 
// Bước 7: Lặp data và gán vào file
// Vì row đầu tiên là tiêu đề rồi nên những row tiếp theo bắt đầu từ 2
$rowNumber = 2;
foreach ($data as $index => $item) 
{
    // A1, A2, A3, ...
    $PHPExcel->getActiveSheet()->setCellValue('A' . $rowNumber, ($index + 1));
     
    // B1, B2, B3, ...
    $PHPExcel->getActiveSheet()->setCellValue('B' . $rowNumber, $item[0]);
 
    // C1, C2, C3, ...
    $PHPExcel->getActiveSheet()->setCellValue('C' . $rowNumber, $item[1]);
     
    // Tăng row lên để khỏi bị lưu đè
    $rowNumber++;
}
 
// Bước 8: Khởi tạo đối tượng Writer
$objWriter = PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel5');
 
// Bước 9: Trả file về cho client download
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="bai-01-demo-excel-freetuts.net.xls"');
header('Cache-Control: max-age=0');
if (isset($objWriter)) {
    $objWriter->save('php://output');
} -->