<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../app/config/database.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "phong123@"; // 🔐 thay bằng chuỗi bí mật giống login

$headers = getallheaders();
$authHeader = $headers['Authorization'] ?? '';

if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
    http_response_code(401);
    echo json_encode([
        "status" => "error",
        "message" => "Token không hợp lệ hoặc không được cung cấp."
    ]);
    exit;
}

$token = str_replace('Bearer ', '', $authHeader);

try {
    $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));
    $user = (array)$decoded->data;

    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("SELECT MAKH, TEN, EMAIL FROM KHACHHANG WHERE MAKH = :id");
    $stmt->bindParam(':id', $user['MAKH']);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        echo json_encode([
            "status" => "success",
            "data" => $data
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Không tìm thấy thông tin khách hàng."
        ]);
    }
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode([
        "status" => "error",
        "message" => "Token không hợp lệ: " . $e->getMessage()
    ]);
}
