<?php
// Cấu hình CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

require_once $_SERVER['DOCUMENT_ROOT'] . '/WebQuanLySpa/app/config/database.php';

$database = new Database();
$conn = $database->getConnection();

// Câu lệnh SQL lấy dữ liệu từ DICHVU và LOAIDICHVU
$sql = "SELECT DICHVU.MADV, DICHVU.TEN, DICHVU.MOTA, DICHVU.THOIGIANTHUCHIEN, DICHVU.GIATIEN, LOAIDICHVU.TENLOAI, DICHVU.HINHANH
        FROM DICHVU
        INNER JOIN LOAIDICHVU ON DICHVU.MALOAI = LOAIDICHVU.MALOAI";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Lấy kết quả và trả về dưới dạng JSON
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kiểm tra nếu có dữ liệu
if (count($results) > 0) {
    echo json_encode([
        "status" => "success",
        "data" => $results
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Không có dữ liệu"
    ]);
}
?>
