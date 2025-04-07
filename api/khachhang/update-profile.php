<?php
require_once '../auth.php'; // kiểm tra token
require_once '../../app/config/database.php';

$makh = $user_data['MAKH'];
$data = json_decode(file_get_contents("php://input"));

if (json_last_error() != JSON_ERROR_NONE) {
    echo json_encode(["status" => "error", "message" => "Dữ liệu không hợp lệ."]);
    exit;
}

if (!isset($data->TEN) || !isset($data->DCHI) || !isset($data->DTHOAI) || !isset($data->EMAIL)) {
    echo json_encode(["status" => "error", "message" => "Thiếu thông tin cần thiết."]);
    exit;
}

$database = new Database();
$conn = $database->getConnection();

// Câu lệnh SQL để cập nhật thông tin khách hàng
$sql = "UPDATE KHACHHANG SET TEN = :ten, DCHI = :dchi, DTHOAI = :dthoai, EMAIL = :email";

// Nếu có mật khẩu mới, thêm vào câu lệnh SQL
if (!empty($data->MATKHAU)) {
    $sql .= ", MATKHAU = :matkhau";
}

$sql .= " WHERE MAKH = :makh";

// Chuẩn bị câu lệnh SQL
$stmt = $conn->prepare($sql);
$stmt->bindParam(':ten', $data->TEN);
$stmt->bindParam(':dchi', $data->DCHI);
$stmt->bindParam(':dthoai', $data->DTHOAI);
$stmt->bindParam(':email', $data->EMAIL);
$stmt->bindParam(':makh', $makh, PDO::PARAM_INT);

// Nếu có mật khẩu mới, mã hóa mật khẩu và bind tham số
if (!empty($data->MATKHAU)) {
    $hashedPassword = password_hash($data->MATKHAU, PASSWORD_BCRYPT);
    $stmt->bindParam(':matkhau', $hashedPassword);
}

// Thực thi câu lệnh SQL và trả về kết quả
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Cập nhật thông tin thành công."]);
} else {
    echo json_encode(["status" => "error", "message" => "Cập nhật thất bại."]);
}
?>
