<?php
require_once '../../app/config/database.php';  // Đảm bảo đường dẫn đúng
require_once '../../app/models/KhachhangModel.php';  // Include class KhachhangModel

// Tạo đối tượng KhachhangModel
$khachhangModel = new KhachhangModel();

// Lấy tất cả khách hàng từ database
$customers = $khachhangModel->getAllCustomers();

if ($customers) {
    echo json_encode([
        "status" => "success",
        "data" => $customers
    ]);
} else {
    echo json_encode([
        "status" => "fail",
        "message" => "Không có dữ liệu."
    ]);
}
?>
