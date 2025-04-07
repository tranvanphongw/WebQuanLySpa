<?php
require_once '../auth.php';
require_once '../../app/config/database.php';

if (!isset($user_data['ROLE']) || $user_data['ROLE'] !== 'admin') {
    http_response_code(403);
    echo json_encode(["status" => "error", "message" => "Truy cập bị từ chối."]);
    exit;
}

$database = new Database();
$conn = $database->getConnection();

// Tổng doanh thu
$sql1 = "SELECT SUM(SOTIEN) AS TONGDOANHTHU FROM THANHTOAN";
$stmt1 = $conn->prepare($sql1);
$stmt1->execute();
$doanhthu = $stmt1->fetch(PDO::FETCH_ASSOC)['TONGDOANHTHU'] ?? 0;

// Số khách hàng
$sql2 = "SELECT COUNT(*) AS SOKHACH FROM KHACHHANG";
$stmt2 = $conn->query($sql2);
$sokhach = $stmt2->fetch(PDO::FETCH_ASSOC)['SOKHACH'] ?? 0;

// Số lịch đặt
$sql3 = "SELECT COUNT(*) AS SOLICHDAT FROM LICHDAT";
$stmt3 = $conn->query($sql3);
$solich = $stmt3->fetch(PDO::FETCH_ASSOC)['SOLICHDAT'] ?? 0;

// Số đánh giá
$sql4 = "SELECT COUNT(*) AS SODANHGIA FROM DANHGIA";
$stmt4 = $conn->query($sql4);
$sodanhgia = $stmt4->fetch(PDO::FETCH_ASSOC)['SODANHGIA'] ?? 0;

echo json_encode([
    "status" => "success",
    "data" => [
        "tong_doanh_thu" => $doanhthu,
        "so_khach_hang" => $sokhach,
        "so_lich_dat" => $solich,
        "so_danh_gia" => $sodanhgia
    ]
]);
?>
