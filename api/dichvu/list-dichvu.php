<?php
// Cấu hình CORS
header("Access-Control-Allow-Origin: *");  // Cho phép yêu cầu từ bất kỳ nguồn nào
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");  // Các phương thức HTTP cho phép
header("Access-Control-Allow-Headers: Content-Type");  // Các header cho phép

require_once $_SERVER['DOCUMENT_ROOT'] . '/WebQuanLySpa/app/config/database.php';

// Tiếp tục mã xử lý API của bạn
$database = new Database();
$conn = $database->getConnection();

// Kiểm tra nếu có tham số tìm kiếm
if (isset($_GET['search'])) {
    $search = $_GET['search']; // Lấy giá trị tìm kiếm từ form
    $sql = "SELECT DICHVU.MADV, DICHVU.TEN, DICHVU.MOTA, DICHVU.THOIGIANTHUCHIEN, DICHVU.GIATIEN, LOAIDICHVU.TENLOAI, DICHVU.HINHANH
            FROM DICHVU
            INNER JOIN LOAIDICHVU ON DICHVU.MALOAI = LOAIDICHVU.MALOAI
            WHERE DICHVU.TEN LIKE :search OR DICHVU.MOTA LIKE :search"; // Tìm kiếm theo tên và mô tả
    $stmt = $conn->prepare($sql);
    $stmt->execute([':search' => '%' . $search . '%']);
} else {
    // Nếu không có tìm kiếm, lấy tất cả dịch vụ
    $sql = "SELECT DICHVU.MADV, DICHVU.TEN, DICHVU.MOTA, DICHVU.THOIGIANTHUCHIEN, DICHVU.GIATIEN, LOAIDICHVU.TENLOAI, DICHVU.HINHANH
            FROM DICHVU
            INNER JOIN LOAIDICHVU ON DICHVU.MALOAI = LOAIDICHVU.MALOAI";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "status" => "success",
    "data" => $results
]);
?>