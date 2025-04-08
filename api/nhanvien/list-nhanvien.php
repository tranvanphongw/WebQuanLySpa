<?php
// Cấu hình CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require_once $_SERVER['DOCUMENT_ROOT'] . '/WebQuanLySpa/app/config/database.php';

$database = new Database();
$conn = $database->getConnection();

// Truy vấn để lấy danh sách nhân viên
$sql = "SELECT MANV, TEN, CHUYENMON, DIEMDANHGIA, HINHANH FROM NHANVIEN";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Lấy kết quả và trả về dưới dạng JSON
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "status" => "success",
    "data" => $results
]);
?>
