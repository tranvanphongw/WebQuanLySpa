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

    // Lấy dữ liệu từ request body
    $data = json_decode(file_get_contents("php://input"), true);
    
    // Cập nhật thông tin vào cơ sở dữ liệu
    $stmt = $conn->prepare("UPDATE KHACHHANG SET TEN = :ten, EMAIL = :email, DCHI = :dchi, DTHOAI = :dthoai WHERE MAKH = :makh");
    $stmt->bindParam(':ten', $data['TEN']);
    $stmt->bindParam(':email', $data['EMAIL']);
    $stmt->bindParam(':dchi', $data['DCHI']);
    $stmt->bindParam(':dthoai', $data['DTHOAI']);
    $stmt->bindParam(':makh', $user['MAKH']);
    $stmt->execute();

    echo json_encode([
        "status" => "success",
        "message" => "Cập nhật thông tin thành công."
    ]);
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode([
        "status" => "error",
        "message" => "Token không hợp lệ: " . $e->getMessage()
    ]);
}
?>
