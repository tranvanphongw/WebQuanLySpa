<?php
require_once '../auth.php';
require_once '../../app/config/database.php';

$data = json_decode(file_get_contents("php://input"));
$makh = $user_data['MAKH'];

if (!isset($data->MALICH) || !isset($data->HINHTHUCTHANHTOAN)) {
    echo json_encode(["status" => "error", "message" => "Thiếu dữ liệu thanh toán."]);
    exit;
}

$malich = $data->MALICH;
$hinhthuc = $data->HINHTHUCTHANHTOAN;

$database = new Database();
$conn = $database->getConnection();

// 1. Kiểm tra lịch đã hoàn thành chưa
$sqlCheck = "SELECT LD.GIATIEN, DV.GIATIEN
             FROM LICHDAT LD 
             INNER JOIN DICHVU DV ON LD.MADV = DV.MADV
             WHERE LD.MALICH = :malich AND LD.MAKH = :makh AND LD.MATRANGTHAI = 3";
$stmt = $conn->prepare($sqlCheck);
$stmt->bindParam(':malich', $malich);
$stmt->bindParam(':makh', $makh);
$stmt->execute();

$info = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$info) {
    echo json_encode(["status" => "error", "message" => "Chỉ có thể thanh toán sau khi hoàn thành dịch vụ."]);
    exit;
}

$sotien = $info['GIATIEN'];

// 2. Tạo thanh toán
$sqlInsert = "INSERT INTO THANHTOAN (MALICH, MAKH, SOTIEN, HINHTHUCTHANHTOAN)
              VALUES (:malich, :makh, :sotien, :hinhthuc)";
$stmt = $conn->prepare($sqlInsert);
$stmt->bindParam(':malich', $malich);
$stmt->bindParam(':makh', $makh);
$stmt->bindParam(':sotien', $sotien);
$stmt->bindParam(':hinhthuc', $hinhthuc);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Thanh toán thành công."]);
} else {
    echo json_encode(["status" => "error", "message" => "Thanh toán thất bại."]);
}
?>
