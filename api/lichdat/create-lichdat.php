<?php
// API xử lý việc tạo lịch đặt
include_once '../config/database.php';
include_once '../models/LichDatModel.php';

$makh = $_POST['MAKH'];
$manv = $_POST['MANV'];
$madv = $_POST['MADV'];
$thoigianbatdau = $_POST['THOIGIANBATDAU'];
$thoigianketthuc = $_POST['THOIGIANKETTHUC'];
$matrangthai = 1; // Trạng thái "Đang chờ"

$lichdat = new LichDatModel($makh, $manv, $madv, $thoigianbatdau, $thoigianketthuc, $matrangthai);

if ($lichdat->createLichDat()) {
    echo json_encode(['status' => 'success', 'message' => 'Lịch đặt thành công']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Lỗi khi tạo lịch đặt']);
}
?>
