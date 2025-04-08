<?php
// Cấu hình CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require_once $_SERVER['DOCUMENT_ROOT'] . '/WebQuanLySpa/app/config/database.php';

$database = new Database();
$conn = $database->getConnection();

// ✅ Cập nhật SQL để lấy cả địa chỉ và số điện thoại
$sql = "SELECT MANV, TEN, DCHI, DTHOAI, CHUYENMON, DIEMDANHGIA, HINHANH FROM NHANVIEN";
$stmt = $conn->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Trả kết quả JSON
echo json_encode([
    "status" => "success",
    "data" => $results
]);
?>
