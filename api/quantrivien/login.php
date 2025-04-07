<?php
require_once '../../vendor/autoload.php';
require_once '../../app/config/database.php';
require_once '../auth.php'; // dùng chung hàm JWT

use \Firebase\JWT\JWT;

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->EMAIL) || !isset($data->MATKHAU)) {
    echo json_encode(["status" => "error", "message" => "Thiếu email hoặc mật khẩu."]);
    exit;
}

$email = $data->EMAIL;
$password = $data->MATKHAU;

$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT * FROM QUANTRIVIEN WHERE EMAIL = :email";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();

$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$admin || !password_verify($password, $admin['MATKHAU'])) {
    echo json_encode(["status" => "error", "message" => "Email hoặc mật khẩu không đúng."]);
    exit;
}

$payload = [
    "MAQT" => $admin['MAQT'],
    "EMAIL" => $admin['EMAIL'],
    "ROLE" => "admin"
];

$secret_key = "YOUR_SECRET_KEY"; // nên lấy từ config
$token = JWT::encode(["data" => $payload], $secret_key, 'HS256');

echo json_encode([
    "status" => "success",
    "message" => "Đăng nhập thành công.",
    "token" => $token,
    "admin" => [
        "MAQT" => $admin['MAQT'],
        "TEN" => $admin['TEN'],
        "EMAIL" => $admin['EMAIL']
    ]
]);
?>
