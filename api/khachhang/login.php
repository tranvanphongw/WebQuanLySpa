<?php
header("Content-Type: application/json");

require_once __DIR__ . '/../../app/config/database.php';
require_once __DIR__ . '/../../vendor/autoload.php'; // Đảm bảo bạn đã cài JWT

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "phong123@"; // 🔐 Đổi bằng chuỗi bí mật của bạn

$db = new Database();
$conn = $db->getConnection();

$data = json_decode(file_get_contents("php://input"), true);
$email = trim($data["EMAIL"] ?? '');
$matkhau = trim($data["MATKHAU"] ?? '');

if (empty($email) || empty($matkhau)) {
    echo json_encode([
        "status" => "error",
        "message" => "Vui lòng nhập email và mật khẩu"
    ]);
    exit;
}

// Kiểm tra email
$sql = "SELECT * FROM KHACHHANG WHERE EMAIL = :email";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || !password_verify($matkhau, $user['MATKHAU'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Email hoặc mật khẩu không chính xác!"
    ]);
    exit;
}

// Tạo token
$payload = [
    "iat" => time(),
    "exp" => time() + (60 * 60 * 24), // 24h
    "data" => [
        "MAKH" => $user["MAKH"],
        "TEN" => $user["TEN"],
        "EMAIL" => $user["EMAIL"]
    ]
];

$jwt = JWT::encode($payload, $secret_key, 'HS256');

echo json_encode([
    "status" => "success",
    "message" => "Đăng nhập thành công!",
    "token" => $jwt
]);
