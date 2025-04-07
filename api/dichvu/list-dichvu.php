<?php
// Cấu hình CORS
header("Access-Control-Allow-Origin: *");  // Cho phép yêu cầu từ bất kỳ nguồn nào
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");  // Các phương thức HTTP cho phép
header("Access-Control-Allow-Headers: Content-Type");  // Các header cho phép

require_once $_SERVER['DOCUMENT_ROOT'] . '/WebQuanLySpa/app/config/database.php';

// Tiếp tục mã xử lý API của bạn
$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT DICHVU.MADV, DICHVU.TEN, DICHVU.MOTA, DICHVU.THOIGIANTHUCHIEN, DICHVU.GIATIEN, LOAIDICHVU.TENLOAI, DICHVU.HINHANH
        FROM DICHVU
        INNER JOIN LOAIDICHVU ON DICHVU.MALOAI = LOAIDICHVU.MALOAI";
$stmt = $conn->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "status" => "success",
    "data" => $results
]);
?>
