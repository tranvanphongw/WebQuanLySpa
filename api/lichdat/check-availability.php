<?php
require_once '../auth.php';
require_once '../../app/config/database.php';

$data = json_decode(file_get_contents("php://input"));
$manv = $data->MANV ?? null;
$start = $data->THOIGIANBATDAU ?? null;
$end = $data->THOIGIANKETTHUC ?? null;

if (!$manv || !$start || !$end) {
    echo json_encode(["status" => "error", "message" => "Thiếu dữ liệu kiểm tra."]);
    exit;
}

$database = new Database();
$conn = $database->getConnection();

$sql = "SELECT * FROM LICHDAT
        WHERE MANV = :manv 
        AND (
            (:start BETWEEN THOIGIANBATDAU AND THOIGIANKETTHUC)
            OR
            (:end BETWEEN THOIGIANBATDAU AND THOIGIANKETTHUC)
            OR
            (THOIGIANBATDAU BETWEEN :start AND :end)
        )
        AND MATRANGTHAI IN (1, 2)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':manv', $manv);
$stmt->bindParam(':start', $start);
$stmt->bindParam(':end', $end);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo json_encode(["status" => "error", "available" => false, "message" => "Nhân viên đã có lịch bận."]);
} else {
    echo json_encode(["status" => "success", "available" => true]);
}
?>
