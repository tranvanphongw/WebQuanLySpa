<?php
require_once __DIR__ . '/../vendor/autoload.php';
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

$headers = getallheaders();
$token = null;

// Kiểm tra header Authorization
if (isset($headers['Authorization'])) {
    $matches = [];
    // Tách "Bearer" khỏi token
    if (preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
        $token = $matches[1];
    }
}

// Kiểm tra token có tồn tại hay không
if (!$token) {
    http_response_code(401);
    die(json_encode(["message" => "Token không được cung cấp"]));
}

$secret_key = "phong123@";  // Thay YOUR_SECRET_KEY bằng key bảo mật của bạn

try {
    // Giải mã JWT
    $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));
    $user_data = (array)$decoded->data;  // Lấy thông tin người dùng từ token
} catch (Exception $e) {
    http_response_code(401);
    die(json_encode(["message" => "Token không hợp lệ: " . $e->getMessage()]));
}
?>
