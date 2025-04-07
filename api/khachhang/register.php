<?php
// Trả về JSON
header("Content-Type: application/json");

// ✅ Kết nối DB: dùng đường dẫn tuyệt đối
require_once __DIR__ . '/../../app/config/database.php';
$db = new Database();
$conn = $db->getConnection();

// ✅ Nhận dữ liệu từ JSON
$data = json_decode(file_get_contents("php://input"), true);

$ten = trim($data["TEN"] ?? '');
$email = trim($data["EMAIL"] ?? '');
$matkhau = trim($data["MATKHAU"] ?? '');

// ✅ Kiểm tra dữ liệu rỗng
if (empty($ten) || empty($email) || empty($matkhau)) {
    echo json_encode([
        "status" => "error",
        "message" => "Vui lòng nhập đầy đủ thông tin!"
    ]);
    exit;
}

// ✅ Kiểm tra email đã tồn tại
$sqlCheck = "SELECT * FROM KHACHHANG WHERE EMAIL = :email";
$stmtCheck = $conn->prepare($sqlCheck);
$stmtCheck->bindParam(':email', $email);
$stmtCheck->execute();

if ($stmtCheck->rowCount() > 0) {
    echo json_encode([
        "status" => "error",
        "message" => "Email đã được sử dụng!"
    ]);
    exit;
}

// ✅ Mã hóa mật khẩu
$hashedPassword = password_hash($matkhau, PASSWORD_DEFAULT);

// ✅ Thêm người dùng mới
$sqlInsert = "INSERT INTO KHACHHANG (TEN, EMAIL, MATKHAU) VALUES (:ten, :email, :matkhau)";
$stmtInsert = $conn->prepare($sqlInsert);
$stmtInsert->bindParam(':ten', $ten);
$stmtInsert->bindParam(':email', $email);
$stmtInsert->bindParam(':matkhau', $hashedPassword);

try {
    $stmtInsert->execute();
    echo json_encode([
        "status" => "success",
        "message" => "Đăng ký thành công!"
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Lỗi hệ thống: " . $e->getMessage()
    ]);
}
