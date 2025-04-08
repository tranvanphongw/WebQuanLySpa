<?php
require_once __DIR__ . '/../vendor/autoload.php';
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

$headers = getallheaders();
$token = null;

// Kiểm tra cả các biến thường gặp (Authorization viết hoa và viết thường)
$authHeader = $headers['Authorization'] ?? $headers['authorization'] ?? null;

if ($authHeader) {
    $matches = [];
    // Tách "Bearer" khỏi token
    if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
        $token = $matches[1];
    }
}

// Nếu không có token hợp lệ
if (!$token) {
    http_response_code(401);
    die(json_encode([
        "message" => "Token không được cung cấp hoặc không đúng định dạng.",
        "headers" => $headers // Gửi lại headers để dễ debug frontend
    ]));
}

$secret_key = "phong123@";

try {
    // Giải mã JWT
    $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));
    $user_data = (array)$decoded->data;
} catch (Exception $e) {
    http_response_code(401);
    die(json_encode(["message" => "Token không hợp lệ: " . $e->getMessage()]));
}
?>
