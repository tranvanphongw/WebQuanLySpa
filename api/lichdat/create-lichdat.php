<?php
require_once '../auth.php'; // lấy $user_data từ token
require_once '../../app/config/database.php';

$data = json_decode(file_get_contents("php://input"));
$makh = $user_data['MAKH'];

if (
    !isset($data->MANV) ||
    !isset($data->MADV) ||
    !isset($data->THOIGIANBATDAU)
) {
    echo json_encode(["status" => "error", "message" => "Thiếu dữ liệu đặt lịch."]);
    exit;
}

$manv = $data->MANV;
$madv = $data->MADV;
$thoigianBatDau = $data->THOIGIANBATDAU;

$database = new Database();
$conn = $database->getConnection();

// 1. Lấy thời gian thực hiện dịch vụ
$sql1 = "SELECT THOIGIANTHUCHIEN FROM DICHVU WHERE MADV = :madv";
$stmt1 = $conn->prepare($sql1);
$stmt1->bindParam(':madv', $madv);
$stmt1->execute();
$service = $stmt1->fetch(PDO::FETCH_ASSOC);

if (!$service) {
    echo json_encode(["status" => "error", "message" => "Dịch vụ không tồn tại."]);
    exit;
}

$thoigianKetThuc = date('Y-m-d H:i:s', strtotime($thoigianBatDau . " +{$service['THOIGIANTHUCHIEN']} minutes"));

// 2. Kiểm tra trùng lịch của nhân viên
$sql2 = "SELECT * FROM LICHDAT
         WHERE MANV = :manv 
         AND (
             (:start BETWEEN THOIGIANBATDAU AND THOIGIANKETTHUC)
             OR
             (:end BETWEEN THOIGIANBATDAU AND THOIGIANKETTHUC)
             OR
             (THOIGIANBATDAU BETWEEN :start AND :end)
         )
         AND MATRANGTHAI IN (1, 2)"; // 1=Đang chờ, 2=Xác nhận
$stmt2 = $conn->prepare($sql2);
$stmt2->bindParam(':manv', $manv);
$stmt2->bindParam(':start', $thoigianBatDau);
$stmt2->bindParam(':end', $thoigianKetThuc);
$stmt2->execute();

if ($stmt2->rowCount() > 0) {
    echo json_encode(["status" => "error", "message" => "Nhân viên đã có lịch trong khung giờ này."]);
    exit;
}

// 3. Thêm lịch đặt mới
$sql3 = "INSERT INTO LICHDAT (MAKH, MANV, MADV, THOIGIANBATDAU, THOIGIANKETTHUC, MATRANGTHAI)
         VALUES (:makh, :manv, :madv, :start, :end, 1)";
$stmt3 = $conn->prepare($sql3);
$stmt3->bindParam(':makh', $makh);
$stmt3->bindParam(':manv', $manv);
$stmt3->bindParam(':madv', $madv);
$stmt3->bindParam(':start', $thoigianBatDau);
$stmt3->bindParam(':end', $thoigianKetThuc);

if ($stmt3->execute()) {
    echo json_encode(["status" => "success", "message" => "Đặt lịch thành công."]);
} else {
    echo json_encode(["status" => "error", "message" => "Không thể đặt lịch."]);
}
?>
