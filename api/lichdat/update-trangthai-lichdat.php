<?php
require_once '../auth.php';
require_once '../../app/config/database.php';

$data = json_decode(file_get_contents("php://input"));
$malich = $data->MALICH ?? null;
$matrangthai = $data->MATRANGTHAI ?? null;

if (!$malich || !$matrangthai) {
    echo json_encode(["status" => "error", "message" => "Thiếu mã lịch hoặc trạng thái."]);
    exit;
}

$database = new Database();
$conn = $database->getConnection();

$sql = "UPDATE LICHDAT SET MATRANGTHAI = :matrangthai WHERE MALICH = :malich";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':matrangthai', $matrangthai, PDO::PARAM_INT);
$stmt->bindParam(':malich', $malich, PDO::PARAM_INT);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Cập nhật trạng thái thành công."]);
} else {
    echo json_encode(["status" => "error", "message" => "Lỗi khi cập nhật trạng thái."]);
}
?>
